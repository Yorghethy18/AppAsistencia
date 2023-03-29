<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbasistencia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtener el mes seleccionado por el usuario
$mes_seleccionado = $_POST['mes'];

// Convertir la fecha en formato 'YYYY-MM-DD'
$fecha_inicio = date('Y-m-01', strtotime($mes_seleccionado));
$fecha_fin = date('Y-m-t', strtotime($mes_seleccionado));

// Llamar al procedimiento almacenado
$stmt = $conn->prepare("CALL sp_reporte_horas_ausencias_mensual(NULL, ?, ?)");
$stmt->bind_param("ii", $anio, $mes);
$anio = date('Y', strtotime($mes_seleccionado));
$mes = date('m', strtotime($mes_seleccionado));
$stmt->execute();
$resultado = $stmt->get_result();

// Mostrar resultados en una tabla HTML
if ($resultado->num_rows > 0) {
    echo "<table border='2,5' align = center>";
    echo "<tr>
              <th bgcolor = #EBEFEF align = 'center' > NOMBRE COMPLETO </th>
              <th bgcolor = #EBEFEF align = 'center' > FECHA AUSENCIA </th>
              <th bgcolor = #EBEFEF align = 'center' > TIPO AUSENCIA </th>
              <th bgcolor = #EBEFEF align = 'center' > COMENTARIO </th>
              <th bgcolor = #EBEFEF align = 'center' > ESTADO AUSENCIA </th>
          </tr>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['NOMBRE_COMPLETO'] . "</td>";
        echo "<td>" . $fila['FECHA_AUSENCIA'] . "</td>";
        echo "<td>" . $fila['tipo_ausencia'] . "</td>";
        echo "<td>" . $fila['comentario'] . "</td>";
        echo "<td>" . $fila['estado_ausencia'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron ausencias para el mes seleccionado.";
}

// Cerrar conexión
$conn->close();
?>
