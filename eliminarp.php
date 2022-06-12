<?php
include('db.php');

$id=$_POST['txtID'];
mysqli_query($conexion, "DELETE FROM productos where id='$id'") or die("error al eliminar");

mysqli_close($conexion);
header("location:dashboardp.php")

?>
