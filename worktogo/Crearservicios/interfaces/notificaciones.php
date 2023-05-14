<?php include("./navbar/cabecera.php");
include('../bd/cons.php'); 
  session_start(); // Inicia la sesión
  $mi_variable = $_SESSION['mi_variable']; // Obtiene el valor de la variable almacenada en la sesión 

$sentenciaSQL = $conexion->prepare("SELECT cedula FROM usuarios Where Email ='$mi_variable'");
$sentenciaSQL->execute();
$listacedula=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
foreach($listacedula as $lcedula){
    $fkcedula = $lcedula['cedula'];
}

$sentenciaSQL = $conexion->prepare("SELECT s.id,s.nombreser,u.cedula,u.nombre,u.email,u.telefono
FROM servicios s
JOIN solicitud so ON s.id = so.fk_id_servicio
JOIN usuarios u ON so.fk_id_solicitante = u.cedula
WHERE s.fk_id_usuario = '$fkcedula';';
");
$sentenciaSQL->execute();
$listasolicitudes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<figure class="text-center">
  <blockquote class="blockquote">
    <p>Aqui puedes ver las notificaciones de quien solicita tus empleos</p>
  </blockquote>
  <figcaption class="blockquote-footer">
   Tu eres responsable de tus acciones <cite title="Source Title">!!!</cite>
  </figcaption>
</figure>

<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id servicio</th>
                <th>Nombre del servicio</th>
                <th>cedula solicitante</th>
                <th>nombre solicitante</th>
                <th>email</th>
                <th>telefono</th>
            </tr>
        </thead>
        <tbody>
            <style>
                .descripcion-corta {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            }
            </style>
            <?php 
            foreach($listasolicitudes as $soli){ ?>
            <tr>
                <td > <?php echo $soli['id']; ?></td>
                <td > <?php echo $soli['nombreser']; ?></td>
                <td > <?php echo $soli['cedula']; ?></td>
                <td><?php echo $soli['nombre'];?></td>
                <td ><?php echo $soli['email']; ?></td>
                <td ><?php echo $soli['telefono']; ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>



<?php include("./navbar/pie.php"); ?>