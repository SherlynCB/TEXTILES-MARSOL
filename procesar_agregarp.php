<?php

    include('db.php');

    insertar($conexion);
    
    
    function insertar($conexion){
        $informacion =$_POST['informacion'];
        $medidas =$_POST['medidas'];
        $modelo=$_POST['modelo'];
        $precio =$_POST['precio'];
        $id_categoria=$_POST['id_categoria'];
        $activo=$_POST['activo'];
        $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $id= $_POST['id'];
 

        $consulta ="INSERT INTO productos (informacion, medidas, modelo, precio, id_categoria,activo,imagen, id) 
        VALUES ('$informacion', '$medidas', '$modelo','$precio','$id_categoria','$activo','$imagen','$id')";
        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        header("Location: dashboardp.php");
        }
           
?>
