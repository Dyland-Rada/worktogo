<?php
include('../bd/cons.php');
  session_start(); // Inicia la sesión
  $mi_variable = $_SESSION['mi_variable']; // Obtiene el valor de la variable almacenada en la sesión 

$sentenciaSQL = $conexion->prepare("SELECT cedula FROM usuarios Where Email ='$mi_variable'");
$sentenciaSQL->execute();
$listacedula=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
foreach($listacedula as $lcedula){
    $fkcedula = $lcedula['cedula'];
}
  

    
  ?>
<?php  include('navbar/cabecera.php')?>
<?php
$txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
$txtnombre=(isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
$img=(isset($_FILES['img']['name']))?$_FILES['img']['name']:"";
$txtdescripcion=(isset($_POST['txtdescripcion']))?$_POST['txtdescripcion']:"";
$precio=(isset($_POST['precio']))?$_POST['precio']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";


switch($accion){
    case"agregar":
        $sentenciaSQL=$conexion->prepare("INSERT INTO servicios (nombre, imagen, descripcion, precio, fk_id_usuario) VALUES (:nombre, :imagen, :descripcion, :precio, :fk_id_usuario); ");
        $sentenciaSQL->bindParam(':nombre',$txtnombre);

        $fecha= new Datetime();
        $nombreArchivo=($img!="")?$fecha->getTimestamp()."_".$_FILES["img"]["name"]:"imagen.jpg";
        $tmpImagen=$_FILES["img"]["tmp_name"];
        if($tmpImagen!=""){
            move_uploaded_file($tmpImagen,"img/".$nombreArchivo);
        }
        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->bindParam(':descripcion',$txtdescripcion);
        $sentenciaSQL->bindParam(':precio',$precio);
        $sentenciaSQL->bindParam(':fk_id_usuario',$fkcedula);
        $sentenciaSQL-> execute();
        header("Location:mis_servicios.php");
     break;
    case"modificar":
        $sentenciaSQL = $conexion->prepare("UPDATE servicios SET nombre=:nombre,descripcion=:descripcion,precio=:precio WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre',$txtnombre);
        $sentenciaSQL->bindParam(':descripcion',$txtdescripcion);
        $sentenciaSQL->bindParam(':precio',$precio);
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();

        if($img!=""){
            $fecha= new Datetime();
            $nombreArchivo=($img!="")?$fecha->getTimestamp()."_".$_FILES["img"]["name"]:"imagen.jpg";

            $tmpImagen=$_FILES["img"]["tmp_name"];

            move_uploaded_file($tmpImagen,"img/".$nombreArchivo);
            $sentenciaSQL = $conexion->prepare("SELECT imagen FROM servicios WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        $servicio=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        if(isset($servicio["imagen"]) && ($servicio["imagen"]!="imagen.jpg")){
                if(file_exists("img/".($servicio["imagen"]))){
                    unlink("img/".($servicio["imagen"]));
                }
        }
        $sentenciaSQL = $conexion->prepare("UPDATE servicios SET imagen=:imagen WHERE id=:id");
        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
     
        }
        header("Location:mis_servicios.php");
     break;

    case"cancelar":
        header("Location:mis_servicios.php");
     break;

     case"Seleccionar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM servicios WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        $servicio=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtid=$servicio['id'];
        $txtnombre=$servicio['nombre'];
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

        $sentenciaSQL = $conexion->prepare("DELETE FROM servicios WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        header("Location:mis_servicios.php");

    break;
    
}
$sentenciaSQL = $conexion->prepare("SELECT * FROM servicios WHERE fk_id_usuario = $fkcedula");
$sentenciaSQL->execute();
$listaservicios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
//////////////inicio html////////
?>
<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos del servicio solicitado
        </div>
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
        <div class = "form-group">
    <label for="txtid">ID</label>
    <input type="text" required class="form-control" value="<?php echo $txtid;?>" id="txtid" name="txtid"  readonly placeholder="LA ID ES ESTABLECIDA POR EL SISTEMA" >
    </div>
    <div class = "form-group">
    <label for="txtnombre">Nombre del servicio</label>
    <input type="text"required class="form-control" id="txtnombre" name="txtnombre" value="<?php echo $txtnombre;?>"  placeholder="Servicio que usted requiere">
    </div>
    <div class="form-group">
    <label for="img">Imagen relacionada</label>
    <br>
    <?php
        if($img!=""){    ?>
        
        <img src="img/<?php echo $img ?>" width="60" alt="" srcset="">
      <?php  }?>
    <br><br>
    <input  type="file"  id="img" name="img"> 
    </div>
    <div class="form-group">
    <label for="txtdescripcion">Descripcion del problema</label>
    <textarea  required name="txtdescripcion"id="txtdescripcion" rows="3" cols="50" ><?php echo $txtdescripcion;?></textarea>
    </div>
     <div class="form-group">
    <label for="precio">Precio dispuesto a pagar $COP</label>
    <input  required type="number"id="precio" value="<?php echo $precio;?>"name="precio" class="form-control" min="0" max="unlimited" step="1" placeholder="$0.0">
     </div>
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" <?php echo($accion=="Seleccionar")?"disabled":""; ?> value="agregar"class="btn btn-success">Agregar</button>
        <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":""; ?>value="modificar"class="btn btn-warning">Modificar</button>
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
                <td > <?php echo $servicio['nombre']; ?></td>
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


<?php  include('navbar/pie.php')?>