<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbasistencia";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Configurar la zona horaria
date_default_timezone_set('America/Lima');
// Verificar conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['dni']) && !empty($_POST['dni'])) { 
    //Verificamos que se haya enviado el DNI por el formulario y que no esté vacío
    $dni = $_POST['dni'];

    // Validar formato del DNI
    if (!preg_match('/^[0-9]{8}$/', $dni)) {
        echo "<script>alert('El DNI debe tener 8'); window.location.href ='../index.html';</script>";
        exit();
    }
    
    if (isset($_POST['entrada'])) {
        // Si se hizo clic en el botón "Hora Entrada"
          // Consulta para obtener el nombre completo del trabajador
          $query = "SELECT apellidos, nombres FROM tb_trabajadores WHERE dni='$dni'";
          $result = $conn->query($query);
          $row = $result->fetch_assoc();
          $nombre_completo = $row['apellidos'] . ' ' . $row['nombres'];

           // Consulta para obtener la última hora de entrada registrada para el trabajador
            $query = "SELECT hora_entrada FROM tb_asistencia INNER JOIN tb_trabajadores ON tb_asistencia.idtrabajadores = tb_trabajadores.idtrabajadores WHERE tb_trabajadores.dni='$dni' AND tb_asistencia.tipo_registro = 'E' ORDER BY fecha_asistencia DESC, hora_entrada DESC LIMIT 1";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $ultima_hora_entrada = $row['hora_entrada'];
            $hora_actual = date('H:i:s');
        //Creamos la consulta para verificar si el trabajador ya tiene una hora de entrada registrada hoy
        
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            //Si el trabajador ya tiene una hora de entrada registrada hoy
            echo "<script>alert('El trabajador $nombre_completo ya tiene una hora de entrada registrada hoy a las $ultima_hora_entrada'); window.location.href ='../index.html';</script>";
        } else {
            //Si el trabajador no tiene una hora de entrada registrada hoy
            $query = "SELECT idtrabajadores FROM tb_trabajadores WHERE dni='$dni'";
            //Creamos la consulta para verificar si el DNI existe en la base de datos
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                //Si el DNI existe
                $id_trabajador = $result->fetch_assoc()["idtrabajadores"];
                $query = "INSERT INTO tb_asistencia (idtrabajadores, fecha_asistencia, hora_entrada, estado_asistencia, tipo_registro) VALUES ('$id_trabajador', CURDATE(), CURTIME(), 'ASISTIO', 'E')"; 
                //Creamos la consulta para insertar la hora de entrada en la tabla de asistencia
                if ($conn->query($query) === TRUE) { 
                    //Si la consulta se ejecuta correctamente
                    echo "<script>alert('Hora de entrada del trabajador $nombre_completo registrada correctamente hoy a las $hora_actual'); window.location.href = '../index.html';</script>";
                    //Mostramos un mensaje de éxito
                } else {
                    echo "<script>alert('Error al añadir la hora de entrada'); window.location.href = '../index.html';</script>"; 
                    //Mostramos un mensaje de error
                }
            } else {
                //Si el DNI no existe
                echo "<script>alert('El DNI no existe en la base de datos'); window.location.href = '../index.html';</script>"; 
                //Mostramos un mensaje de error
            }

        }
    } elseif (isset($_POST['salida'])) {
        
        // Si se hizo clic en el botón "Hora Salida"
        $query = "SELECT * FROM tb_asistencia INNER JOIN tb_trabajadores ON tb_asistencia.idtrabajadores = tb_trabajadores.idtrabajadores WHERE tb_trabajadores.dni='$dni' AND tb_asistencia.fecha_asistencia = CURDATE() AND tb_asistencia.tipo_registro = 'E'";
    //Creamos la consulta para verificar si el trabajador tiene una hora de entrada registrada hoy
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        //Si el trabajador tiene una hora de entrada registrada hoy
        $row = $result->fetch_assoc();
        $id_asistencia = $row["idasistencia"];
        $nombre_trabajador = $row["apellidos"] . " " . $row["nombres"]; // Obtenemos el nombre completo del trabajador
        $query = "UPDATE tb_asistencia SET hora_salida = CURTIME(), tipo_registro = 'S' WHERE idasistencia = '$id_asistencia'";
        //Actualizamos la hora de salida y cambiamos el tipo de registro a "Salida"
        if ($conn->query($query) === TRUE) {
            //Si la consulta se ejecuta correctamente
            $hora_salida = date("H:i:s"); // Obtenemos la hora actual de salida
            echo "<script>alert('Hora de salida del trabajador $nombre_trabajador registrada correctamente hoy a las $hora_salida'); window.location.href = '../index.html';</script>";
            //Mostramos un mensaje de éxito
        } else {
            echo "<script>alert('Error al añadir la hora de salida'); window.location.href = '../index.html';</script>"; 
            //Mostramos un mensaje de error
        }
    } else {
        //Si el trabajador no tiene una hora de entrada registrada hoy
        echo "<script>alert('El trabajador $dni no tiene una hora de entrada registrada hoy'); window.location.href ='../index.html';</script>";
        //Mostramos un mensaje de error
        }
    }
}
?>