<?php
require('database.php');
require('confDetalles.php');
$db = new Database();

$con = $db->conectar();
$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrrito = array();
if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {
        $sql = $con->prepare("SELECT id, informacion, precio, $cantidad AS cantidad FROM productos WHERE  id=? AND activo=1 ");
        $sql->execute([$clave]);
        $lista_carrrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
}

//session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <meta name="theme-color" content="#7952b3">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Tienda Marsol </title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand ">
                    <img width="75" height="75" src="img/ISOBLANCO.png" alt="logo" class="logo-img">

                </a>

                <div class="collapse navbar-collapse" id="navbarsExample03">
                    <ul class="navbar-nav me-auto mb-2 mb-sm-0">


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                <li><a class="dropdown-item" href="#">Manteles</a></li>
                                <li><a class="dropdown-item" href="catalogoc.php">Colchas</a></li>
                                <li><a class="dropdown-item" href="catalogom.php">Caminos de mesas</a></li>
                        </li>
                    </ul>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ayuda</a>
                    </li>


                </div>

                <div class="text-end">
                    <a href="carrito.php" class="btn btn-primary">
                        Carrito
                        <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                    </a>
                    <a class="btn btn-outline-light me-2" href="ingresar.html">Ingresar</a>
                    <a type="button" href="crearcuenta.php" class="btn btn-warning">Registrarte</a>
                </div>
            </div>

        </nav>
    </header>

    <main>

        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($lista_carrrito == null) {
                            echo '
                    <tr>
                    <td colspan="5" class="text-center">
                    <b>Lista vacia</b>
                    </td>
                    </tr>';
                        } else {
                            $total = 0;
                            foreach ($lista_carrrito as $producto) {
                                $_id = $producto['id'];
                                $informacion = $producto['informacion'];
                                $precio = $producto['precio'];
                                $cantidad = $producto['cantidad'];
                                $subtotal = $precio * $cantidad;
                                $total += $subtotal;

                        ?>

                                <tr>
                                    <td>
                                        <?php echo $informacion ?>
                                    </td>
                                    <td>
                                        <?php echo MONEDA . number_format($precio, 2, '.', ','); ?>
                                    </td>
                                    <td>
                                        <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizarCantidad(this.value,<?php echo $_id; ?>)">
                                    </td>
                                    <td>
                                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"> <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                                        </div>
                                    </td>

                                    <td>
                                        <button id="eliminar"  type="button" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">
                                            Eliminar
                                        </button>
                                    </td>



                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="3">
                                    <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?> </p>
                                </td>
                            </tr>
                    </tbody>
                <?php } ?>
                </table>
            </div>
            <div class="row">
                <div class="col-md-5 offset-md-7 d-grid gap-2">
                    <button class="btn btn-primary btn-lg">Realizar pago</button>
                </div>
            </div>

        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminaModalLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ??Desea eliminar el producto de la lista?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button id="btn-elimina"type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <a class="enlace-footer" href="#">
            <svg xmlns="www.xvideos.com" x="0px" y="0px" width="50" height="50" viewBox="0 0 226 226" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,226v-226h226v226z" fill="#000000"></path>
                    <g fill="#ffffff">
                        <path d="M113,18.83333c-52.00825,0 -94.16667,42.15842 -94.16667,94.16667c0,52.00825 42.15842,94.16667 94.16667,94.16667c52.00825,0 94.16667,-42.15842 94.16667,-94.16667c0,-52.00825 -42.15842,-94.16667 -94.16667,-94.16667zM113,37.66667c41.60283,0 75.33333,33.7305 75.33333,75.33333c0,37.04891 -26.77936,67.78251 -62.01758,74.08269v-45.50163h22.27263l3.31054,-25.65673h-25.43603v-16.35042c-0.00001,-7.42034 2.06798,-12.43295 12.70882,-12.43295h13.4445v-22.89795c-6.54458,-0.66858 -13.11551,-0.99361 -19.69776,-0.97477c-19.53017,0 -32.90315,11.92003 -32.90315,33.80436v18.88851h-22.07031v25.65673h22.07031v45.52003c-35.40101,-6.16634 -62.34864,-36.97342 -62.34864,-74.13786c0,-41.60283 33.7305,-75.33333 75.33333,-75.33333z">
                        </path>
                    </g>
                </g>
            </svg>
        </a>

        <a class="enlace-footer" href="#">
            <svg xmlns="" x="0px" y="0px" width="60" height="60" viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="#000000"></path>
                    <g fill="#ffffff">
                        <path d="M86,11.46667c-41.09653,0 -74.53333,33.4368 -74.53333,74.53333c0,41.09653 33.4368,74.53333 74.53333,74.53333c41.09653,0 74.53333,-33.4368 74.53333,-74.53333c0,-41.09653 -33.4368,-74.53333 -74.53333,-74.53333zM66.88516,34.4h38.21849c17.91667,0 32.49636,14.57422 32.49636,32.48516v38.21849c0,17.91667 -14.57423,32.49636 -32.48516,32.49636h-38.21849c-17.91667,0 -32.49636,-14.57423 -32.49636,-32.48516v-38.21849c0,-17.91667 14.57422,-32.49636 32.48516,-32.49636zM66.88516,45.86667c-11.58707,0 -21.01849,9.43689 -21.01849,21.02969v38.21849c0,11.58707 9.43689,21.01849 21.02969,21.01849h38.21849c11.58707,0 21.01849,-9.43689 21.01849,-21.02969v-38.21849c0,-11.58707 -9.43689,-21.01849 -21.02969,-21.01849zM112.76302,55.41849c2.10987,0 3.81849,1.70862 3.81849,3.81849c0,2.10987 -1.70862,3.82969 -3.81849,3.82969c-2.10987,0 -3.82969,-1.71982 -3.82969,-3.82969c0,-2.10987 1.71982,-3.81849 3.82969,-3.81849zM86,57.33333c15.8068,0 28.66667,12.85987 28.66667,28.66667c0,15.8068 -12.85987,28.66667 -28.66667,28.66667c-15.8068,0 -28.66667,-12.85987 -28.66667,-28.66667c0,-15.8068 12.85987,-28.66667 28.66667,-28.66667zM86,68.8c-9.4993,0 -17.2,7.7007 -17.2,17.2c0,9.4993 7.7007,17.2 17.2,17.2c9.4993,0 17.2,-7.7007 17.2,-17.2c0,-9.4993 -7.7007,-17.2 -17.2,-17.2z">
                        </path>
                    </g>
                </g>
            </svg>
        </a>

        <a class="enlace-footer" href="#">
            <svg xmlns="" x="0px" y="0px" width="48" height="48" viewBox="0 0 172 172" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="#000000"></path>
                    <g fill="#ffffff">
                        <path d="M86,14.33333c-39.5815,0 -71.66667,32.08517 -71.66667,71.66667c0,39.5815 32.08517,71.66667 71.66667,71.66667c39.5815,0 71.66667,-32.08517 71.66667,-71.66667c0,-39.5815 -32.08517,-71.66667 -71.66667,-71.66667zM86,28.66667c31.66233,0 57.33333,25.671 57.33333,57.33333c0,31.66233 -25.671,57.33333 -57.33333,57.33333c-5.27193,0 -10.35229,-0.76706 -15.20117,-2.09961c1.52517,-3.07269 2.8933,-6.3108 3.63933,-9.18229c0.82417,-3.15333 4.19922,-16.01302 4.19922,-16.01302c2.193,4.18533 8.60247,7.74056 15.42513,7.74056c20.30317,0 34.9375,-18.67454 34.9375,-41.88021c0,-22.2525 -18.15294,-38.89876 -41.51628,-38.89876c-29.06083,0 -44.48372,19.50442 -44.48372,40.74642c0,9.87567 5.25496,22.17098 13.66146,26.09115c1.27567,0.59483 1.95975,0.33683 2.25358,-0.89583c0.22933,-0.93883 1.36682,-5.51408 1.87565,-7.64258c0.16483,-0.67367 0.08992,-1.26515 -0.46191,-1.93165c-2.78067,-3.3755 -5.01107,-9.57164 -5.01107,-15.35514c0,-14.8565 11.24584,-29.22656 30.40235,-29.22656c16.54066,0 28.12077,11.27507 28.12077,27.3929c0,18.2105 -9.19573,30.82226 -21.16406,30.82226c-6.60767,0 -11.57114,-5.45574 -9.98015,-12.16374c1.89917,-8.00516 5.58496,-16.64749 5.58496,-22.42383c0,-5.16717 -2.76275,-9.47624 -8.51042,-9.47624c-6.75817,0 -12.19173,6.98213 -12.19173,16.34896c0,5.96267 2.01563,9.99414 2.01563,9.99414c0,0 -6.66903,28.21461 -7.89453,33.46777c-0.60737,2.59249 -0.8101,5.66382 -0.82585,8.73438c-19.05164,-9.32011 -32.20801,-28.8455 -32.20801,-51.48242c0,-31.66233 25.671,-57.33333 57.33333,-57.33333z">
                        </path>
                    </g>
                </g>
            </svg>
        </a>
        <section class="contener">
            <div class="bloques">
                <div class="bloque">
                    <!-- img -->
                    <img class="iblo" src="img/SEGURIDAD.svg" alt="SEGURIDAD">
                    <h3 class="bloqueTitulo"> Protecci??n</h3>
                    <p>Ofrecemos compras seguras y protegidas, contamos con certificado SSL
                        que respalda la protecci??n de tus datos.</p>
                </div>

                <div class="bloque">
                    <!-- img -->
                    <img class="iblo" src="img/entrega.svg" alt="entrega">
                    <h3 class="bloqueTitulo"> Entrega</h3>
                    <p>Compra protegida en caso de perdida de repartidor y cuidado satelital</p>
                </div>
        </section>

        <p>Copyright?? 2022-Todos los derechos reservados Textilera Marsol</p>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        let eliminaModal=document.getElementById('eliminaModal');
        eliminaModal.addEventListener('show.bs.modal',function(event){
            let button = event.relatedTarget
            let id= button.getAttribute('data-bs-id')
            let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
            buttonElimina.value= id
        })

        function actualizarCantidad(cantidad, id) {
            let url = 'actualizar_carrito.php'
            let formData = new FormData()
            formData.append('action', 'agregar');
            formData.append('id', id);
            formData.append('cantidad', cantidad);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let divsubtotal = document.getElementById('subtotal_' + id)
                        divsubtotal.innerHTML = data.sub

                        let total = 0.00
                        let list = document.getElementsByName('subtotal[]')

                        for (let i = 0; i < list.length; i++) {
                            total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                        }
                        total = new Intl.NumberFormat('en-US', {
                            minimumFractionDigits: 2
                        }).format(total)
                        document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total

                    }
                })
        }

        function eliminar() {
            let botonElimina = document.getElementById('btn-elimina')
            let id= botonElimina.value

            let url = 'actualizar_carrito.php'
            let formData = new FormData()
            formData.append('action', 'eliminar');
            formData.append('id', id);
        
            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        location.reload()
                    }
                })
        }
    </script>

</body>

</html>
