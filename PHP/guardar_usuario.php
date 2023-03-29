<?php
// Iniciamos la sesión
session_start();

if (isset($_POST['username']) && isset($_POST['pass'])) {
  $servername = "localhost"; //Nombre del servidor de la base de datos
  $username = "root"; //Nombre de usuario de la base de datos
  $password = ""; //Contraseña de la base de datos
  $dbname = "dbasistencia"; //Nombre de la base de datos

  //Crea la conexión
  $conn = new mysqli($servername, $username, $password, $dbname);

  //Verifica si la conexión fue exitosa
  if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
  } 

  //Obtiene los valores del formulario
  $usuario = $_POST['username'];
  $contraseña = $_POST['pass'];

  //Hace la consulta a la tabla de acceso para verificar si los valores ingresados coinciden con los almacenados en la tabla
  $sql = "SELECT * FROM tb_acceso WHERE username='$usuario' AND pass='$contraseña'";
  $result = $conn->query($sql);

  //Verifica si se encontró un registro en la tabla con los valores ingresados
  if ($result->num_rows > 0) {
    //Si se encontró un registro, significa que el usuario y la contraseña son correctos
    $_SESSION["username"] = $usuario; // Almacena el nombre de usuario en la variable de sesión
    header("Location: ../PHP/admnistracion.php"); // Redirecciona al usuario a la página de inicio de la aplicación
  } else {
    //Si no se encontró un registro, significa que el usuario y/o la contraseña son incorrectos
    echo "<script>alert('Usuario y/o contraseña incorrectos'); window.location.href = 'form_acceso.php';</script>";
  }
} else {
  // Si no se enviaron correctamente los valores de usuario y contraseña, redireccionamos al formulario de acceso
  header("Location: form_acceso.php");
  exit();
}
?>
