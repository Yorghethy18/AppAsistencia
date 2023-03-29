<?php
#require_once ('../PHP/conex.php');
// Configuración de conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'dbasistencia';

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $database);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos enviados por el formulario
$apellidos = $_POST['apellidos'];
$nombres = $_POST['nombres'];
$dni = $_POST['dni'];
$cargo = $_POST['cargo'];
$idturno = $_POST['idturno'];
$numero = $_POST['num_contacto'];
$persona = $_POST['persona_contacto'];
$estado = $_POST['estado'];


// Consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO tb_trabajadores (idturno, apellidos, nombres, dni, cargo, num_contacto, persona_contacto, estado)
        VALUES ('$idturno', '$apellidos', '$nombres', '$dni', '$cargo', '$numero', '$persona', '$estado')";

// Ejecutar la consulta y verificar si se insertaron los datos correctamente
if ($conn->query($sql) === TRUE) {
    $nombre_completo = $apellidos . ' ' . $nombres;
    echo "<script>alert('Trabajador $nombre_completo agregado correctamente'); window.location.href = '../admnistracion.php';</script>";
} else {
    echo "<scrip>alert('Error al agregar trabajador'); window.location.href = 'formulario.php';</script>" . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
