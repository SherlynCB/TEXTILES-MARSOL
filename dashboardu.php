<?php
include('db.php');
?>
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
                <img  src="img/LogoOficial.png" alt="" width="175" height="75">
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
                    <a href="dashboardu.php"><i class="fas fa-user"></i><span>Usuarios</span></a>
                    <a href="dashboardp.php"><i class="fas fa-lightbulb"></i><span>Productos</span></a>
                    <a href="dashboardr.php"><i class="fas fa-book"></i><span>Reportes</span></a>
                    <a href="dashboardc.php"><i class="fas fa-pen"></i><span>Configuraci??n</span></a>
                </nav>
            </div>
            <main class="main col">
                <div class="row justify-content-center align-content-center text-center">
                
<div class="Contenido">


<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Usuario</th>
      <th scope="col">Nombre</th>
      <th scope="col">Contrase??a</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Cargo</th>
      <th scope="col">      </th>


    </tr>
  </thead>
  <tbody>

  <?php
    $sql="SELECT * FROM usuarios";
    $result = mysqli_query($conexion,$sql);

    while($mostrar = mysqli_fetch_array($result)){

  ?>
    <tr>
      <td><?php echo $mostrar ['id']?> </td>
      <td><?php echo $mostrar ['usuario']?> </td>
      <td><?php echo $mostrar ['nombre']?> </td>
      <td><?php echo $mostrar ['password']?> </td>
      <td><?php echo $mostrar ['correo']?> </td>
      <td><?php echo $mostrar ['telefono']?> </td>
      <td><?php echo $mostrar ['id_cargo']?> </td>
      <td>
      <!-- editar -->
        <a class="btn btn-success" href="editar.php?id=<?php echo $mostrar['id']?>">Editar</a>

      <!-- eliminar -->
        <form action="eliminar.php" method="post">
            <input type="hidden" value="<?php echo $mostrar['id']?>"  name="txtID" readonly>
            <td><input class="btn btn-danger"type="submit" value="Eliminar" name="btnEliminar"></td>
        </form>
      </td>
            
      
    </tr>
    <?php
    }
    ?>
    
  </tbody>
</table>
<a class="btn btn-success" href="agregar.php">Agregar</a>
                    
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
