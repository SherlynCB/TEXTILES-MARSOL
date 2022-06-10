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


                                <form action="procesar_agregarp.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" value="" name="id">
                                    <h4>Descripción</h4>
                                    <input type="text" required value="" name="informacion">
                                    <h4>Medidas</h4>
                                    <input type="text" required value="" name="medidas">
                                    <h4>Modelo</h4>
                                    <input type="text" required value="" name="modelo">
                                    <h4>Precio</h4>
                                    <input type="text" required value="" name="precio">
                                    <h4>Categoria</h4>
                                    <select  required name="categoria">
                                      
                                        <option value="1">Colchas</option>
                                        <option value="2">Servilletas</option>
                                        <option value="3">Caminos</option>
                                    </select>
                                    <h4>Activo</h4>
                                    <select required name="activo" >
                                      
                                        <option value="0">No</option>
                                        <option value="1">Sí</option>
                                        
                                    </select>
                                    
                                    <h4>Imagen</h4>
                                    <input type="file" required name="imagen">


                                    <br>
                                    <br>
                                    <input class="btn btn-success" type="submit" value="Agregar">

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
