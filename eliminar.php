<?php
include('db.php');

$id=$_POST['txtID'];
mysqli_query($conexion, "DELETE FROM usuarios where id='$id'") or die(mysqli_error($mysqli));

mysqli_close($conexion);
header("location:dashboardu.php")

?>
