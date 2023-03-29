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

// Consulta a la base de datos
$sql = "SELECT tra.nombres, tra.apellidos, CONCAT(MONTHNAME(a.fecha_asistencia), ' ', YEAR(a.fecha_asistencia)) AS mes_anio, SUM(a.horas_extra) AS total_horas_extra
        FROM tb_asistencia a
        INNER JOIN tb_trabajadores tra ON a.idtrabajadores = tra.idtrabajadores
        WHERE a.fecha_asistencia BETWEEN '$fecha_inicio' AND '$fecha_fin'
        AND a.estado_asistencia = 'ASISTIO'
        GROUP BY tra.idtrabajadores, YEAR(a.fecha_asistencia), MONTH(a.fecha_asistencia)
        ORDER BY tra.nombres, tra.apellidos, YEAR(a.fecha_asistencia), MONTH(a.fecha_asistencia)";

$resultado = $conn->query($sql);

// Mostrar resultados en una tabla HTML
if ($resultado->num_rows > 0) {
    echo "<table border='2,5' align = center>";
        echo "<tr>
                  <th bgcolor = #EBEFEF align = 'center' > NOMBRES </th>
                  <th bgcolor = #EBEFEF align = 'center' > APELLIDOS </th>
                  <th bgcolor = #EBEFEF align = 'center' > MES Y AÑO </th>
                  <th bgcolor = #EBEFEF align = 'center' > TOTAL HORAS EXTRAS </th>
              </tr>";
    while($fila = $resultado->fetch_assoc()) {
      
        echo "<tr>
                <td align = 'center' >".$fila["nombres"]."</td>
                <td align = 'center' >".$fila["apellidos"]."</td>
                <td align = 'center' >".$fila["mes_anio"]."</td>
                <td align = 'center' >".$fila["total_horas_extra"]."</td>
                </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

$conn->close();
?>
