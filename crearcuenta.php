<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
  
    <title>Ingresar</title>
</head>
<body class="text-center">
    
    <main class="iform-signin">
      <form class="formulario" action="conexion.php" class="formulario" method="post">
        <img class="mb-4" src="img/LOGONEGROFINAL.png" alt="" width="200" height="200">
        <h2 class="h3 mb-3 fw-normal">Crear usuario</h2>
		<div class="datos">
        <div class="form-floating">
          <input type="text" required name="usuario" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Usuario</label>
        </div>
		<div class="form-floating">
          <input type="text" required name="nombre" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Nombre</label>
        </div>
        <div class="form-floating">
          <input type="password" required name="password"class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Contraseña</label>
        </div>
		<div class="form-floating">
          <input type="password" required name="password2"class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Confirmar contraseña</label>
        </div>
		<div class="form-floating">
          <input type="email" required name="correo" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Correo</label>
        </div>
		<div class="form-floating">
          <input type="text" required name="telefono" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Telefono</label>
        </div>
		</div>
    
        <br>
        <button class="w-100 btn btn-lg btn-primary" name="enviar" type="submit">Registrar</button>
        <br>
        <br>
        <a class="mt-5 mb-3 text-muted" href="ingresar.html">¿Ya tienes cuenta?  Ingresar aquí</a>
      </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
