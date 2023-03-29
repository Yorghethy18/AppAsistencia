<?php
// Conecta a la base de datos
$conn = new mysqli("localhost", "root", "", "dbasistencia");

// Verifica si hay errores de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta los usuarios de la tabla tb_acceso
$sql = "SELECT idlogin, username, pass FROM tb_acceso";
$resultado = $conn->query($sql);

// Muestra los usuarios en una tabla
if ($resultado->num_rows > 0) {
    echo "<table  border='2' align='center'>";
    echo "<tr>
              <th style='text-align: center; padding: 5px;' bgcolor='#DEDEDE'>USUARIO</th>
              <th style='text-align: center; padding: 5px;' bgcolor='#DEDEDE'>CONTRASEÑA</th>
          </tr>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr><td style='text-align: center; padding: 5px;'>" . $fila["username"] . "</td><td style='text-align: center; padding: 5px;'>*****</td></tr>";
    }
    echo "</table>";

} else {
    echo "No se encontraron usuarios.";
}

// Cierra la conexión
$conn->close();
?>
