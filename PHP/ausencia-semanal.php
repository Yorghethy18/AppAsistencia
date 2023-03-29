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

  // Verificar si se han enviado las fechas desde el formulario
  if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
    $fecha_inicio = date("Y-m-d", strtotime($_POST['fecha_inicio']));
    $fecha_fin = date("Y-m-d", strtotime($_POST['fecha_fin']));

    // Llamar al procedimiento almacenado con las fechas ingresadas en el formulario
    $sql = "CALL sp_reporte_ausencias_semanal('$fecha_inicio', '$fecha_fin')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
      die("Error al ejecutar la consulta SQL: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
      // Crear una tabla HTML para mostrar los datos
      echo "<table border='2,5' align='center'>";
      echo "<tr>
              <th bgcolor='#EBEFEF' align='center'>TRABAJADOR</th>
              <th bgcolor='#EBEFEF' align='center'>SEMANA</th>
              <th bgcolor='#EBEFEF' align='center'>DÍAS DE AUSENCIA</th>
            </tr>";
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td align='center'>".$row["NOMBRE_COMPLETO"]."</td>
                <td align='center'>".$row["SEMANA_FECHAS"]."</td>
                <td align='center'>".$row["DIA_AUSENCIA"]."</td>
              </tr>";
      }
      echo "</table>";
    } else {
      echo "<script>alert('No se encontraron resultados en el rango de fechas seleccionado'); window.location.href = '../PHP/ausencia-semanal.php';</script>"; 
    }
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($conn);
?>
