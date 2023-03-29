<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type ="text/css" href="../css/es">
</head>
<body>

    <form method="POST" action="guardartra.php">
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>
        <br>
        <br>

        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" required>
        <br>
        <br>

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required>
        <br>
        <br>
        
        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo">
        <br>
        <br>

        <label for="num_contacto">Número de contacto:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">+51</span>
            </div>
            <input type="tel" id="num_contacto" name="num_contacto" pattern="[0-9]{9}" inputmode="numeric" required>
        </div>


        <label for="persona_contacto">Persona de contacto:</label>
        <input type="text" id="persona_contacto" name="persona_contacto" required>
        <br>
        <br>


    <!-- Eliminar el select de estado y agregar un campo oculto -->
        <input type="hidden" id="estado" name="estado" value="1">

        <label for="idturno">Turno:</label>
        <select id="idturno" name="idturno">
            <option value="2" selected >Turno 1</option>
            <option value="3" >Turno 2</option>
        </select>
        <br>
        <br>

        <input type="submit" value="Agregar trabajador">
    </form>
</body>
</html>