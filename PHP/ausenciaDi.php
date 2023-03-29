<?php
// Conectarse a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbasistencia";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
  die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se ha enviado la fecha desde el formulario
if (isset($_POST['fecha'])) {
  $fecha = date("Y-m-d", strtotime($_POST['fecha']));

  // Llamar al procedimiento almacenado con la fecha ingresada en el formulario
  $sql = "CALL sp_reporte_ausencia_diario('$fecha')";
  $result = mysqli_query($conn, $sql);

  // Verificar si la consulta fue exitosa
  if (!$result) {
    die("Error al ejecutar la consulta SQL: " . mysqli_error($conn));
  }

   // Mostrar los resultados de la consulta
   if (mysqli_num_rows($result) > 0) {
    // Crear una tabla HTML para mostrar los datos
    echo "<table border='2,5' align = center>";
    echo "<tr>
            <th bgcolor = #EBEFEF align = 'center' > NOMBRE COMPLETO </th>
            <th bgcolor = #EBEFEF align = 'center' > FECHA </th>
            <th bgcolor = #EBEFEF align = 'center' > TIPO AUSENCIA </th>
            <th bgcolor = #EBEFEF align = 'center' > COMENTARIO </th>
            <th bgcolor = #EBEFEF align = 'center' > ESTADO AUSENCIA </th>
          </tr>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
          <td align = 'center' >".$row["NOMBRE_COMPLETO"]."</td>
          <td align = 'center' >".$row["fecha"]."</td>
          <td align = 'center' >".$row["tipo_ausencia"]."</td>
          <td align = 'center' >".$row["comentario"]."</td>
          <td align = 'center' >";

if ($row['estado_ausencia'] == 'A' || $row['estado_ausencia'] == 'R') {
  echo $row['estado_ausencia'];
} else {
  echo "<select name='estado'>
          <option value='P' ".($row['estado_ausencia'] == 'P' ? 'selected' : '').">Pendiente</option>
          <option value='A'>Aprobado</option>
          <option value='R'>Rechazado</option>
        </select>";
}

echo "</td>
        </tr>";
  }
}else {
    echo "<script>alert('No se encontraron resultados en el día $fecha seleccionada'); window.location.href = '../PHP/ausencia-diaria.php';</script>"; 
  }

  // Liberar el conjunto de resultados y cerrar la conexión a la base de datos
  mysqli_free_result($result);
  mysqli_close($conn);
}

?>
