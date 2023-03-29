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
        $sql = "CALL sp_reporte_horas_extras_dias('".$_POST['fecha']."')";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
        die("Error al ejecutar la consulta SQL: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
        // Crear una tabla HTML para mostrar los datos
        echo "<table border='2,5' align = center>";
        echo "<tr><th bgcolor = #EBEFEF align = 'center' > ID </th>
                  <th bgcolor = #EBEFEF align = 'center' > NOMBRES </th>
                  <th bgcolor = #EBEFEF align = 'center' > APELLIDOS </th>
                  <th bgcolor = #EBEFEF align = 'center' > FECHA DE ASISTENCIA </th>
                  <th bgcolor = #EBEFEF align = 'center' > HORA DE ENTRADA </th>
                  <th bgcolor = #EBEFEF align = 'center' > HORA DE SALIDA </th>
                  <th bgcolor = #EBEFEF align = 'center' > HORAS TRABAJADAS </th>
                  <th bgcolor = #EBEFEF align = 'center' > HORAS EXTRAS </th>
              </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td align = 'center' >".$row["idtrabajadores"]."</td>
                <td align = 'center' >".$row["nombres"]."</td>
                <td align = 'center' >".$row["apellidos"]."</td>
                <td align = 'center' >".$row["fecha_asistencia"]."</td>
                <td align = 'center' >".$row["hora_entrada"]."</td>
                <td align = 'center' >".$row["hora_salida"]."</td>
                <td align = 'center' >".$row["horas_trabajadas"]."</td>
                <td align = 'center' >".$row["horas_extra"]."</td>
                </tr>";
        }
        echo "</table>";
        } else {
        echo "<script>alert('No se encontraron resultados en el día $fecha seleccionada'); window.location.href = '../PHP/horas_diarias.php';</script>"; 
        }
    }
		// Cerrar la conexión a la base de datos
		mysqli_close($conn);
	?>