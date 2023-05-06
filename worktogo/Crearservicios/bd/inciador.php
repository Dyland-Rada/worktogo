<?php

if (!empty($_POST["btniniciar"])) {
    
    if (empty($_POST["usuario"]) and empty($_POST["contra"])) {
       echo '<div class="bad"> Los campos estan vacios</div>';
    } else {
        $correo=$_POST["usuario"];
        $contra=$_POST["contra"];
        $sql=$conexion->query("SELECT * FROM usuarios WHERE email='$correo' and clave='$contra' ");
        if ($datos=$sql->fetch_object()) {
            header("Location: ./interfaces/inicio.php");
        } else {
            echo '<div class="bad">Credenciales incorrectas</div>';
        }
        
    }
    
}


?>