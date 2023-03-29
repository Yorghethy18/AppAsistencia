<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    
    <link rel="stylesheet" type ="text/css" href="../css/es.css">
</head>
<body>
<a href="formulario_dni.php" class="btn btn-secondary back-button"><i class="fas fa-arrow-left"></i> Regresar</a>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="../img/hombre (1).png">
                </div> 
                <form class="col-12" method="post" action="guardar_usuario.php">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="username">
                    </div>
                    <div class="form-group" id="contraseña-group">
                        <input type="password" class="form-control" placeholder="Contraseña" name="pass">
                    </div>
                    <button type="submit" class=" btn btn-primary"><i class="fas fa-sign-in-alt"></i>Ingresar</button>
                </form>
                <div class="col-12 forgot">
                    <a href="#">Recordar contraseña</a>
                </div>
            </div>
        </div>
    </div>
    
       <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="../img/Logo.svg" alt="Logo de Otro Espacio">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>Siguenos</h2>
                <div class="red-social">
                    <a href="https://www.facebook.com/otroespacioagencia"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="https://www.instagram.com/otro_espacioagencia/?hl=es-la"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2023 <b>Otro Espacio Agencia</b> - Todos los Derechos Reservados</small>
        </div>

       </footer>
</body>
</html>




