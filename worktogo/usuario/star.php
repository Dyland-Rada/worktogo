<?php
$fkservicio = $_POST['fk_id_Servicio'];

session_start();
$fkservicioenv = $fkservicio;
$_SESSION['fkservicioenv'] = $fkservicioenv;
header("location:detalle.php");
?>