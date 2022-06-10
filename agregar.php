<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra">
                <img src="img/LogoOficial.png" alt="" width="175" height="75">
            </div>
            <div class="col-4 text-right barra">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a href="#" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle user"></i></a>

                        <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                            <a class="dropdown-item menuperfil cerrar" href="index.html"><i class="fas fa-sign-out-alt m-1"></i>Salir
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="barra-lateral col-12 col-sm-auto">
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                    <a href="dashboardu.html"><i class="fas fa-user"></i><span>Usuarios</span></a>
                    <a href="dashboardp.html"><i class="fas fa-lightbulb"></i><span>Productos</span></a>
                    <a href="dashboardr.html"><i class="fas fa-book"></i><span>Reportes</span></a>
                    <a href="dashboardc.html"><i class="fas fa-pen"></i><span>Configuración</span></a>
                </nav>
            </div>
            <main class="main col">
                <div class="row justify-content-center align-content-center text-center">

                    <div class="Contenido">
                        <table class="table">
                            <thead>


                                <form action="procesar_agregar.php" method="POST">
                                    <input type="hidden" value="" name="id">
                                    <h4>Usuario</h4>
                                    <input type="text" required value="" name="usuario">
                                    <h4>Nombre</h4>
                                    <input type="text" required value="" name="nombre">
                                    <h4>Contraseña</h4>
                                    <input type="text" required value="" name="password">
                                    <h4>Correo</h4>
                                    <input type="text" required value="" name="correo">
                                    <h4>Telefono</h4>
                                    <input type="text" required value="" name="telefono">
                                    <H4>Cargo</H4>
                                    <select required name="id_cargo">
                                        <option value="1">Administrador</option>
                                        <option value="2">Cliente</option>
                                    </select>


                                    <br>
                                    <br>
                                    <input class="btn btn-success" type="submit" value="Actualizar">

                                </form>
                                </tbody>
                        </table>

                    </div>

            </main>
        </div>
    </div>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/646c794df3.js"></script>
</body>

</html>
