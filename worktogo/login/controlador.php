<?php

if (!empty($_POST["btn_iniciarsesion"])) {

    if (empty($_POST["IniciarEmail"]) and empty($_POST["IniciarContra"])) {
        echo '<div class="bad"> Los campos estan vacios</div>';
    } else {
        $correo = $_POST["IniciarEmail"];
        $contra = $_POST["IniciarContra"];
        $sql = $conexion->query("SELECT * FROM usuarios WHERE email='$correo' and clave='$contra' ");
        if ($datos = $sql->fetch_object()) {
            header("Location: ./usuario/index.php");

            session_start(); // Inicia la sesión
            $mi_variable = $correo; // Variable que deseas almacenar
            $_SESSION['mi_variable'] = $mi_variable; // Almacena la variable en la sesión

        } else {
            echo '<div class="bad">Credenciales incorrectas</div>';
        }

    }

}




?>