<?php

    include('db.php');
    insertar($conexion);
        
    function insertar($conexion){
        $nombre =$_POST['nombre'];
        $cp=$_POST['cp'];
        $estado=$_POST['estado'];
        $municipio =$_POST['municipio'];
        $calle=$_POST['calle'];
        $ninterior=$_POST['ninterior'];
        $nexterior=$_POST['nexterior'];
        $telefono=$_POST['telefono'];
       
        $consulta ="INSERT INTO direccion ( nombre,cp,estado, municipio, calle, ninterior, 
        nexterior, telefono) 
        VALUES ('$nombre', '$cp', '$estado','$municipio','$calle','$ninterior','$nexterior','$telefono')";
        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        
        header("Location: Ingresar.html");
        }
           
?>
