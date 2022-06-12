<?php

    include('db.php');

    insertar($conexion);
    
    
    function insertar($conexion){
        $usuario =$_POST['usuario'];
        $nombre =$_POST['nombre'];
        $password=$_POST['password'];
        $correo =$_POST['correo'];
        $telefono=$_POST['telefono'];
        $id= $_POST['id'];
        $id_cargo= '2';


        $consulta ="INSERT INTO usuarios (usuario, nombre, password, correo, telefono,id,id_cargo) 
        VALUES ('$usuario', '$nombre', '$password','$correo','$telefono','$id','$id_cargo')";
        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        header("Location: index.php");
        }
           
?>
