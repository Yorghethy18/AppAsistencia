<?php
// Iniciamos la sesión
session_start();

if (isset($_POST['username']) && isset($_POST['pass'])) {
    // Obtener los valores del formulario
    $username_ = $_POST['username'];
    $password_ = $_POST['pass'];
    
    // Conectarse a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbasistencia";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // Ejecutar la consulta SQL para insertar el nuevo usuario
    $sql = "INSERT INTO tb_acceso (username, pass) VALUES ('$username_', '$password_')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo usuario registrado exitosamente";
        // Redirigir al usuario a la página de inicio de sesión
        header("Location: form_acceso.php");
        exit();
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
    
    $conn->close();
} else {
    // Si no se enviaron correctamente los valores de usuario y contraseña, redireccionamos al formulario de registro
    header("Location: form_registro.php");
    exit();
}
?>
