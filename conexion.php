<?php

    $conexion = mysqli_connect('localhost','root','','marsol')
    or die(mysqli_error($mysqli));

    insertar($conexion);
    
    
    function insertar($conexion){
        $usuario =$_POST['usuario'];
        $nombre =$_POST['nombre'];
        $password=$_POST['password'];
        $correo =$_POST['correo'];
        $telefono=$_POST['telefono'];
        
        $id= $_POST['id'];

        $consulta ="INSERT INTO usuarios (usuario, nombre, password, correo, telefono,id) 
        VALUES ('$usuario', '$nombre', '$password','$correo','$telefono','$id')";
        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        header("Location: crearcuenta2.php");
        }    
         
?>

