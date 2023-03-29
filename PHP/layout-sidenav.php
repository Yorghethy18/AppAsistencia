<?php
session_start();

// Verifica si la variable de sesión "username" está configurada, lo que significa que el usuario ha iniciado sesión
if(!isset($_SESSION["username"])){
    // Si la variable de sesión no está configurada, redirecciona al usuario a la página de inicio de sesión
    header("Location: form_acceso.php");
    exit(); // Asegúrate de que el script no continúe ejecutándose después de la redirección
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Static Navigation - SB Admin</title>

        <!-- NUESTRO CSS -->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css//esti.css" rel="stylesheet"/>

        <!-- OTRAS AMEWOS-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        
        <!--JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
        <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    
        <!-- Los iconos tipo Solid de Fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
        <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

	    <script>
		$(document).ready(function(){
			$("#btnMostrarTabla").click(function(){
				$.ajax({
					url: "../PHP/listar_trabajadores.php",
					success: function(respuesta){
						$("#divTabla").html(respuesta);
					}
				});
			});
		});
	</script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../PHP/admnistracion.php">Sistema Administrativo</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <span class="navbar-text">
                <?php echo $username; ?>
            </span>
            
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../PHP/admnistracion.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Registro Trabajadores
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../PHP/layout-static.php">Formulario Registro</a>
                                    <a class="nav-link" href="../PHP/layout-sidenav.php">Registro Usuario</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                REPORTES
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Horas Extras
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>

                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
											<a class="nav-link" href="../PHP/horas_diarias.php">Diario</a>
                                            <a class="nav-link" href="../PHP/horas_semanal.php">Semanal</a>
                                            <a class="nav-link" href="../PHP/horas_mensual.php">Mensual</a>
                                        </nav>
                                    </div>
									
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Ausencias
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../PHP/formulario-ausencia.php">Formulario Ausencia</a>
                                            <a class="nav-link" href="../PHP/ausencia-diaria.php">Diario</a>
                                            <a class="nav-link" href="../PHP/AusenciaSem.php">Semanal</a>
                                            <a class="nav-link" href="../PHP/AusenciaMen.php">Mensual</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="../HTML/charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="../HTML/tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Registro Usuario</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../PHP/admnistracion.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Registro Usuario</li>
                    </ol>
                    <br>
                    <div class="modal-dialog text-center my-modal">
                        <div class="col-sm-8 main-section">
                            <div class="modal-content">
                                <div class="col-12 user-img">
                                    <img src="../img/acceso.png">
                                </div> 
                                <form class="col-12" method="post" action="../PHP/registrar_usuario.php">
                                    <div class="form-group" id="user-group">
                                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="username" required>
                                    </div>
                                    <div class="form-group" id="contraseña-group">
                                        <input type="password" class="form-control" placeholder="Contraseña" name="pass" required>
                                    </div>
                                    <button type="submit" class=" btn btn-primary"><i class="fa-sharp fa-solid fa-arrow-right-to-bracket"></i>Registrar</button>
                                </form>
                            </di>
                        </div>
                    </div>
                </div>
                <div class="listar_usuario">
                    <a href="#" onclick="mostrarUsuarios(event)">Listar Usuarios</a>
                </div>
                
                <div id="resultado"></div>
                
                <script>
                    function mostrarUsuarios(event) {
                        event.preventDefault();
                        var resultadoDiv = document.getElementById("resultado");
                        if (resultadoDiv.style.display === "none") {
                            // Realiza una petición AJAX al archivo PHP
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    // Muestra los resultados en la página
                                    resultadoDiv.innerHTML = this.responseText;
                                    resultadoDiv.style.display = "block";
                                }
                            };
                            xhttp.open("GET", "../PHP/listar_usuario.php", true);
                            xhttp.send();
                        } else {
                            // Si la tabla está visible, la oculta
                            resultadoDiv.style.display = "none";
                        }
                    }
                </script>
                

            </main>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Otro Espacio 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>
