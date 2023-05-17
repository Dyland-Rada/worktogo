
<?php
include('../bd/cons.php');
  ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="../../css/navcss.css">
     <link rel="stylesheet" href="../../css/csscrearservicios.css?sfgf">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <ul class="nav">
<li><a href="admin.php">
    <img src="../../imgs/aea.png" >
</a></li>
  <li><a href="admin.php">
  <i class="fas fa-home"></i>
   Ver servicios</a></li>
  <li><a href="pqrs.php">
  <i class="fas fa-compass"></i>
   PQRS</a></li>
   <li><a href="../index.php">
  <i class="fas fa-compass"></i>
    Salir del administrador</a></li>
</ul>
    <div class="container">
          <div class="row">
            
          <?php
$txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
$txtnombre=(isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
$img=(isset($_FILES['img']['name']))?$_FILES['img']['name']:"";
$txtdescripcion=(isset($_POST['txtdescripcion']))?$_POST['txtdescripcion']:"";
$precio=(isset($_POST['precio']))?$_POST['precio']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";


switch($accion){
    case"agregar":

     break;
    case"modificar":

    case"cancelar":
        header("Location:admin.php");
     break;

     case"Seleccionar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM servicios WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        $servicio=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtid=$servicio['id'];
        $txtnombre=$servicio['nombreser'];
        $img=$servicio['imagen'];
        $txtdescripcion=$servicio['descripcion'];
        $precio=$servicio['precio'];

    break;

    case"Borrar":
        $sentenciaSQL = $conexion->prepare("SELECT imagen FROM servicios WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        $servicio=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        if(isset($servicio["imagen"]) && ($servicio["imagen"]!="imagen.jpg")){
                if(file_exists("img/".($servicio["imagen"]))){
                    unlink("img/".($servicio["imagen"]));
                }
        }
        $sentenciaSQL = $conexion->prepare("DELETE FROM solicitud WHERE fk_id_servicio=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();

        $sentenciaSQL = $conexion->prepare("DELETE FROM servicios WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        header("Location:admin.php");

    break;
    
}
$sentenciaSQL = $conexion->prepare("SELECT * FROM servicios ");
$sentenciaSQL->execute();
$listaservicios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos del servicio solicitado
        </div>
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
        
    
    
    <div class="form-group">
    <label for="txtdescripcion">Descripcion del problema</label>
    <textarea  required name="txtdescripcion"id="txtdescripcion" rows="20" cols="50" ><?php echo $txtdescripcion;?></textarea>
    </div>
    
    <div class="btn-group" role="group" aria-label="">
       
 
        <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":""; ?> value="cancelar"class="btn btn-dark">Cancelar</button>
    </div>

    </form>
        </div>
  
    </div>

</div>
<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>IMAGEN</th>
                <th>DESCRIPCION</th>
                <th>PRECIO</th>
                <th>Acciones</th>
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
            foreach($listaservicios as $servicio){ ?>
            <tr>
                <td > <?php echo $servicio['id']; ?></td>
                <td > <?php echo $servicio['nombreser']; ?></td>
                <td >
                   <img src="img/<?php echo $servicio['imagen']; ?>" width="60" alt="" srcset="">
               
            
                
                </td>
                <td  class="descripcion-corta"> <?php echo $servicio['descripcion'];?></td>
                <td > <?php echo  $servicio['precio']; ?></td>
                <td>
                    
                    <form method="POST">
                    <input type="hidden" name="txtid" id="txtid" value="<?php echo $servicio['id'];?>">
                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">
                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>








          </div>
     </div> 
  </body>
</html>