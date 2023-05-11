<?php include("../nav/cabecera.php"); ?>
<?php include("../Crearservicios/bd/cons.php");
  session_start(); // Inicia la sesión
  $mi_variable = $_SESSION['mi_variable']; // Obtiene el valor de la variable almacenada en la sesión 
  $fkservicioenv = $_SESSION['fkservicioenv'];


$sentenciaSQL = $conexion->prepare("SELECT cedula FROM usuarios Where Email ='$mi_variable'");
$sentenciaSQL->execute();
$listacedula=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
foreach($listacedula as $lcedula){
    $fkcedula = $lcedula['cedula'];
}





$accion=(isset($_POST['accion']))?$_POST['accion']:"";
switch($accion){
case 'agregar':
    $sentenciaSQL = $conexion->prepare("SELECT fk_id_solicitante FROM solicitud WHERE fk_id_servicio = :fkservicioenv AND fk_id_solicitante = :fkcedula");
    $sentenciaSQL->bindParam(':fkservicioenv', $fkservicioenv);
    $sentenciaSQL->bindParam(':fkcedula', $fkcedula);
    $sentenciaSQL->execute();
    
    if ($sentenciaSQL->rowCount() > 0) {
        echo '<script>alert("Usted ya envió una solicitud");</script>';
    } else {
        $sentenciaSQL = $conexion->prepare("INSERT INTO solicitud (fk_id_servicio,fk_id_solicitante) VALUES (:fk_id_servicio, :fk_id_solicitante);");
        $sentenciaSQL->bindParam(':fk_id_servicio',$fkservicioenv);
        $sentenciaSQL->bindParam(':fk_id_solicitante',$fkcedula);
        $sentenciaSQL->execute();
    }
}
?>


<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Validaccion de solicitud
        </div>
        <div class="card-body">
        <div class = "form-group">
    <form method="POST">
    <label for="txtid">HE LEIDO Y ACEPTO LOS TERMINOS Y CONDICIONES</label> <br>
    <input type="checkbox" required class="form-check-input" name="" id="" value="" checked><br>
    <button type="submit" name="accion" value="agregar"class="btn btn-success">Solicitar empleo</button>
    </div>
    </form>
</div>
</div>
</div>
<div class="col-md-7">
    <?php
    $sentenciaSQL = $conexion->prepare("SELECT * FROM servicios WHERE id =$fkservicioenv");
    $sentenciaSQL->execute();
    $listaservicios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
     foreach($listaservicios as $servicio){ ?>
        <div class="card text-left">
        <img class="card-img-top" style="height: 20rem;"   src="../Crearservicios/interfaces/img/<?php echo $servicio['imagen'];?>">
          <div class="card-body">
            <h4 class="card-title"><?php echo $servicio['nombre']; ?></h4>
            <p class="card-text"><?php echo $servicio['descripcion']; ?></p>
            <h4 class="card-title">Sueldo</h4>
            <p class="card-text">$<?php echo $servicio['precio']; ?></p>
            
          </div>
          
        </div>


        <?php } ?>
    
</div>


<?php include("../nav/pie.php"); ?>






