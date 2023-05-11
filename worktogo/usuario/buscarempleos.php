<?php include("../nav/cabecera.php"); ?>
<?php include("../Crearservicios/bd/cons.php");
$sentenciaSQL = $conexion->prepare("SELECT * FROM servicios");
$sentenciaSQL->execute();
$listaservicios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($listaservicios as $servicio){?>
<div class="col-6 col-sm-4">
    <div class="card" style="height: 26rem;">
        <img class="card-img-top" style="height: 20rem;"   src="../Crearservicios/interfaces/img/<?php echo $servicio['imagen'];?>" alt="">
        <div class="card-body">
            <h4 class="card-title"><?php echo $servicio['nombre'];?></h4>
            <p class="card-text" style="max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;"><?php echo $servicio['descripcion'];?></p>
           <form action="star.php" method="POST">
            <input type="hidden" name="fk_id_Servicio" value="<?php echo $servicio['id'];?>">
            <input type="submit" class="btn btn-primary" value="Guardar variable">

            </form>     
        </div>
    </div> 
</div>
<?php }?>

<?php include("../nav/pie.php");?>