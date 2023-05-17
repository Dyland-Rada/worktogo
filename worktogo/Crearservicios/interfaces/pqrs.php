<?php
include('../bd/cons.php'); 

$sentenciaSQL = $conexion->prepare("SELECT Nombre,Apellido,Email,Telefono,Descripcion,fk_cedula_usuarios
FROM contacto 
");
$sentenciaSQL->execute();
$listacontacto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

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
  <li><a href="mis_servicios.php">
  <i class="fas fa-compass"></i>
   PQRS</a></li>
   <li><a href="../index.php">
  <i class="fas fa-compass"></i>
    Salir del administrador</a></li>
</ul>


    <div class="container ">
     
  <blockquote class="blockquote">
    <p>Aqui puedes ver los Reportes realizados por los usuarios</p>
  </blockquote>

          <div class="row">

          <div class="col-md-7">
    <table class="table table-bordered table-hover  ">
        <thead >
            <tr style="text-align: center;">
                 <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>telefono</th>
                <th>Descripcion del problema</th>
               
            </tr>
        </thead>
        <tbody>
           
            
            <?php 
            foreach($listacontacto as $conta){ ?>
            <tr>
                <td > <?php echo $conta['fk_cedula_usuarios']; ?></td>
                <td > <?php echo $conta['Nombre']; ?></td>
                <td > <?php echo $conta['Apellido']; ?></td>
                <td><?php echo $conta['Email'];?></td>
                <td ><?php echo $conta['Telefono']; ?></td>
                <td ><?php echo $conta['Descripcion']; ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

 
          </div>
     </div> 
  </body>
</html>         