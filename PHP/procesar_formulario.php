<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "dbasistencia");

// Obtener los datos del formulario
$idtrabajadores = $_POST['nombre_trabajador'];
$fecha = $_POST['fecha'];
$tipo_ausencia = $_POST['tipo_ausencia'];
$comentario = $_POST['comentario'];
$estado_ausencia = $_POST['estado_ausencia'];

// Validar los datos del formulario
if (!$idtrabajadores || !$fecha || !$tipo_ausencia || !$estado_ausencia) {
    echo "<script>alert('Por favor complete todos los campos obligatorios.'); window.location.href = '../PHP/formulario-ausencia.php';</script>";
} else {
    // Insertar los datos en la tabla tb_absence
    $sql = "INSERT INTO tb_ausencia (idtrabajadores, fecha, tipo_ausencia, comentario, estado_ausencia)
            VALUES ('$idtrabajadores', '$fecha', '$tipo_ausencia', '$comentario', '$estado_ausencia')";
    if (mysqli_query($conexion, $sql)) {
        echo "<script>alert('Ausencia del trabajador registrado correctamente'); window.location.href = '../PHP/formulario-ausencia.php';</script>";
    } else {
        echo "Ha ocurrido un error al registrar la ausencia: " . mysqli_error($conexion);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
