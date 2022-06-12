<?php
include('db.php');

$id=$_POST['id'];
$informacion=$_POST['informacion'];
$medidas=$_POST['medidas'];
$modelo=$_POST['modelo'];
$precio=$_POST['precio'];
$id_categoria=$_POST['id_categoria'];
$activo=$_POST['activo'];
// $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));



mysqli_query($conexion, "UPDATE `productos` SET `informacion` = '$informacion', `medidas` = '$medidas',
 `modelo` = '$modelo', `precio` = '$precio', `id_categoria` = '$id_categoria',`activo`='$activo'   WHERE `productos`.`id` = '$id';")or die(mysqli_error($mysqli));
mysqli_close($conexion);
header("location:dashboardp.php");
?>
