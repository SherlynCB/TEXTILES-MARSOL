<?php
include('db.php');

$id=$_POST['txtID'];
$usuario=$_POST['txtUsuario'];
$nombre=$_POST['txtNombre'];
$password=$_POST['txtContraseña'];
$correo=$_POST['txtCorreo'];
$telefono=$_POST['txtTelefono'];
$id_cargo=$_POST['txtCargo'];

mysqli_query($conexion, "UPDATE `usuarios` SET `usuario` = '$usuario', `nombre` = '$nombre', `password` = '$password', `correo` = '$correo',
 `telefono` = '$telefono', `id_cargo` = '$id_cargo' WHERE `usuarios`.`id` = '$id';")or die(mysqli_error($mysqli));
mysqli_close($conexion);
header("location:dashboardu.php");
?>
