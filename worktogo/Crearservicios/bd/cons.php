<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'cuentasusers';

try {
  $conexion= new mysqli("localhost","root","","worktogo","3306");
  $conexion->set_charset("utf8");

  } catch(PDOException $e) {
    echo "Error al conectarse a la base de datos: " . $e->getMessage();
  }



?>