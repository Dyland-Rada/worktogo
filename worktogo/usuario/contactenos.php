<?php 
  include('../Crearservicios/bd/cons.php');
  session_start(); // Inicia la sesión
  $mi_variable = $_SESSION['mi_variable']; // Obtiene el valor de la variable almacenada en la sesión 

$sentenciaSQL = $conexion->prepare("SELECT cedula FROM usuarios Where Email ='$mi_variable'");
$sentenciaSQL->execute();
$listacedula=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
foreach($listacedula as $lcedula){
    $fkcedula = $lcedula['cedula'];
}

include("../nav/cabecera.php"); 

$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$apellido=(isset($_POST['apellido']))?$_POST['apellido']:"";
$email=(isset($_POST['email']))?$_POST['email']:"";
$telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
$descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

if ($accion == "Enviar Reporte"){
  $sentenciaSQL=$conexion->prepare("INSERT INTO contacto (nombre, apellido, email, telefono, descripcion, fk_cedula_usuarios) VALUES (:nombre, :apellido, :email, :telefono, :descripcion, :fk_cedula_usuarios); ");
  $sentenciaSQL->bindParam(':nombre',$nombre);
  $sentenciaSQL->bindParam(':apellido',$apellido);
  $sentenciaSQL->bindParam(':email',$email);
  $sentenciaSQL->bindParam(':telefono',$telefono);
  $sentenciaSQL->bindParam(':descripcion',$descripcion);
  $sentenciaSQL->bindParam(':fk_cedula_usuarios',$fkcedula);
  $sentenciaSQL-> execute();
}

?>
<!doctype html>
<html lang="es">

<head>
  <title>Worktogo</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="/worktogo/css/csscontactenos.css">
  <link rel="stylesheet" href="/worktogo/css/csscrearservicios.css">
</head>
<?php
  


?>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-7">
      <div class="titulo-contac" style='text-aling: left;'><h1>Preguntas frecuentes</h1></div><br>
        <table>
          <tbody>
          <?php
            $sentenciaSQL = $conexion->prepare("SELECT TITULO FROM frecuentes");
            $sentenciaSQL->execute();
            $listapreguntas=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
             
            foreach($listapreguntas as $preguntas){?>
              <input type='submit' style='width: 500px' name='accion' value='<?php echo $preguntas ['TITULO'] ?>' class='btn-frecuencia'>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="card">
  <form method="post">
  <label class="titulo-contacto"><h1>Contactenos</h1></label>
  <input type="text" placeholder="Nombre" name='nombre' >
  <input type="text" placeholder="Apellido" name='apellido' >
  <input type="text" placeholder="Email" name='email' >
  <input type="text" placeholder="Telefono" name='telefono' >
  <textarea style='width-max: auto;' rows="3" cols="70" placeholder="Descripcion" name='descripcion'></textarea><br>
  <label class="checkbox-container">
    Acepto las políticas de privacidad
    <input type="checkbox">
    <span class="checkmark"></span>
  </label>
  <input type="submit" value="Enviar Reporte" class="btn btn-primary" name="accion">
  </form>
</div>



</body>

</html> 
