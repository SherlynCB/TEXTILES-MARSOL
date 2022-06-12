<?php

        include('db.php');

      
        $usuario =$_POST['usuario'];
        $password=$_POST['password'];
      
        $consulta ="SELECT * FROM usuarios where usuario ='$usuario' and password ='$password'";
        $resultado=mysqli_query($conexion,$consulta);

        $filas=mysqli_fetch_array($resultado);

        
        if($filas['id_cargo']==1){//admin
            header("Location:dashboardu.php");
        }else
        if($filas['id_cargo']==2){//cliente
            header("Location:index.php");
        } else{
            header("Location:ingresar.html");
        }

        
      mysqli_free_result($resultado);
      mysqli_close($conexion);
        
           
?>
