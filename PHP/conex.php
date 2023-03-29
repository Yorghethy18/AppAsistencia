<?php
// datos de conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dbasistencia";

// creando la conexión a la base de datos
$conn = new mysqli($host, $user, $password, $dbname);

// comprobando si hay errores en la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>