<?php

if (!empty($_POST["btniniciar"])) {
    
    if (empty($_POST["vusuario"]) and empty($_POST["vcontra"])) {
       echo '<div class="bad"> Los campos estan vacios</div>';
    } else {
        
        $contra=$_POST["vcontra"];
        
        $mi_variable = $_SESSION['mi_variable'];
        $sql= $conexion->query("SELECT * FROM usuarios WHERE email='$mi_variable' and clave='$contra' ");

       
        if ($datos=$sql->fetch_object()) {
            header("Location: ./interfaces/inicio.php");
        } else {
            echo '<div class="bad">Credenciales incorrectas</div>';
        }
        
    }
    
}


?>