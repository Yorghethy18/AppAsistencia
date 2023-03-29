<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE ASISTENCIA</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" type ="text/css" href="../css/estilos_central.css">
    
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form class ="form" method="POST" action="guardar_hora.php">
        <img src="../img/Logo.svg" class="Logo" width="590" height="30">
        <div class="form_container">
            <center>
            <h2 class ="form_title" <center><b>SISTEMA DE ASISTENCIA</b></center></h2>
            <center>
            <label for="registro">¿Qué deseas registrar?</label>
            <br>
            <input type="radio" id="entrada" name="registro" value="entrada" onclick="habilitarBotonEntrada()">
            <label for="entrada">Hora de entrada</label>
            <input type="radio" id="salida" name="registro" value="salida" onclick="habilitarBotonSalida()">
            <label for="salida">Hora de salida</label>
            <br><br>
            <div class="form_group">
                <input type="text" id="dni" class="form_input" name="dni" placeholder=" " required>
                <label for="dni" class="form_label">DNI:</label>
                <span class="form_line"></span>	
                <br><br>
            </div>
        </div>
        <button type="submit" class="form_submit" id="botonEntrada" name="entrada" disabled> Hora Entrada </button>
        <button type="submit" class="form_submit1" id="botonSalida" name="salida" disabled> Hora Salida </button>
        <br>
        <div class="grupo-2">
            <br>
            <small>&copy; 2023 <b>Otro Espacio Agencia</b> - Todos los Derechos Reservados</small>
        </div>

       </footer>
        </center>
        
	</form>
    
    <div class="button-container">
        <a href="../PHP/form_acceso.php" class="admin-btn">Acceso Administrativo</a>

    </div>
    <script>
        function habilitarBotonEntrada() {
        document.getElementById("botonEntrada").disabled = false;
        document.getElementById("botonSalida").disabled = true;
        }

        function habilitarBotonSalida() {
        document.getElementById("botonSalida").disabled = false;
        document.getElementById("botonEntrada").disabled = true;
        }
    </script>
</body>

</html>


