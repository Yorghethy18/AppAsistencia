<?php

#require_once ('../PHP/conex.php');
// Configuración de conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'dbasistencia';

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $database);
$conn->set_charset("utf8");

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener la lista de trabajadores

$sql = "SELECT t.*, tu.nombre_turno FROM tb_trabajadores t JOIN tb_turnos tu ON t.idturno = tu.idturno";

// Ejecutar la consulta y obtener los resultados
$resultado = $conn->query($sql);

// Generar la lista de trabajadores en HTML
        $html = "<table border='1' align = center cellpadding='10'>";
            $html .= "<tr><th bgcolor = #DCE8E8>APELLIDOS</th>
                  <th bgcolor = #DCE8E8 > NOMBRES </th>
                  <th bgcolor = #DCE8E8 > DNI </th>
                  <th bgcolor = #DCE8E8 > CARGO </th>
                  <th bgcolor = #DCE8E8 > TURNO </th>
                  <th bgcolor = #DCE8E8 > NUMERO DE CONTACTO </th>
                  <th bgcolor = #DCE8E8 > PERSONA DE CONTACTO </th>
                  <th bgcolor = #DCE8E8 > MODIFICAR TRABAJADOR </th>
                  </tr>";
                  
                  while ($trabajador = $resultado->fetch_assoc()) {
                    $html .= "<tr>
                    <td style='text-align: center;'>".$trabajador['apellidos']."</td>
                    <td style='text-align: center;'>".$trabajador['nombres']."</td>
                    <td style='text-align: center;'>".$trabajador['dni']."</td>
                    <td style='text-align: center;'>".$trabajador['cargo']."</td>
                    <td style='text-align: center;'>".$trabajador['nombre_turno']."</td>
                    <td style='text-align: center;'>".$trabajador['num_contacto']."</td>
                    <td style='text-align: center;'>".$trabajador['persona_contacto']."</td>
                </tr>";
       
                }
                $html .= "</table>";

// Devolver la lista de trabajadores como una respuesta AJAX
echo $html;

// Cerrar la conexión a la base de datos
$conn->close();
?>
