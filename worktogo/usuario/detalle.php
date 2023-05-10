<?php include("../nav/cabecera.php"); ?>
<?php include("../Crearservicios/bd/cons.php");
  session_start(); // Inicia la sesión
  $mi_variable = $_SESSION['mi_variable']; // Obtiene el valor de la variable almacenada en la sesión 
$sentenciaSQL = $conexion->prepare("SELECT * FROM servicios");
$sentenciaSQL->execute();
$listaservicios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

$sentenciaSQL = $conexion->prepare("SELECT cedula FROM usuarios Where Email ='$mi_variable'");
$sentenciaSQL->execute();
$listacedula=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
foreach($listacedula as $lcedula){
    $fkcedula = $lcedula['cedula'];

}

echo $fkcedula;
 ?>








<?php ?>

