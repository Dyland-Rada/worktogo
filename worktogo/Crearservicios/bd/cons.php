<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'worktogo';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Error al conectarse a la base de datos: " . $e->getMessage();
  }



?>