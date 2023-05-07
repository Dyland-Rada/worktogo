<?php  include('navbar/cabecera.php')?>
<?php
$txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
$txtnombre=(isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
$img=(isset($_FILES['img']['name']))?$_FILES['img']['name']:"";
$txtdescripcion=(isset($_POST['txtdescripcion']))?$_POST['txtdescripcion']:"";
$precio=(isset($_POST['precio']))?$_POST['precio']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include('../bd/cons.php');

switch($accion){
    case"agregar":
       
        break;
    case"modificar":
   
            break;
    case"cancelar":
      
                break;
}
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
    <input type="text" class="form-control" id="txtid" name="txtid"  readonly placeholder="LA ID ES ESTABLECIDA POR EL SISTEMA" >
    </div>
    <div class = "form-group">
    <label for="txtnombre">Nombre del servicio</label>
    <input type="text" class="form-control" id="txtnombre" name="txtnombre"  placeholder="Servicio que usted requiere">
    </div>
    <div class="form-group">
    <label for="img">Imagen relacionada</label>
    <input type="file"  id="img" name="img">
    </div>
    <div class="form-group">
    <label for="txtdescripcion">Descripcion del problema</label>
    <textarea name="txtdescripcion"id="txtdescripcion" rows="3" cols="50"></textarea>
    </div>
     <div class="form-group">
    <label for="precio">Precio dispuesto a pagar $COP</label>
    <input type="number"id="precio"name="precio" class="form-control" min="0" max="unlimited" step="1" placeholder="$0.0">
     </div>
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" value="agregar"class="btn btn-success">Agregar</button>
        <button type="submit" name="accion" value="modificar"class="btn btn-warning">Modificar</button>
        <button type="submit" name="accion" value="cancelar"class="btn btn-dark">Cancelar</button>
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
                <th>DESCRIPCION</th>
                <th>IMAGEN</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td >02</td>
                <td scope="row">tuberia</td>
                <td>UNA TUBERIA QUE SE ROMPIO EN LA CASA DE TU PRIMA LA CALVA</td>
                <td>imagen.jpg</td>
                <td>seleccionar | borrar</td>
            </tr>
        </tbody>
    </table>
</div>


<?php  include('navbar/pie.php')?>