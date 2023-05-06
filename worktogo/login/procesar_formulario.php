<?php
  
  
  $nombre = $_POST['RNombre'];
  $cedula = $_POST['RCedula'];
  $telefono = $_POST['RTelefono'];
  $email = $_POST['REmail'];
  $clave = $_POST['RContra'];
  
  
  include("con_db.php");
  
  
  $consulta = "SELECT * FROM usuarios WHERE email = '$email'";
  $resultado = mysqli_query($conexion, $consulta);


  if (mysqli_num_rows($resultado) > 0) {
    $mensaje = "El correo electrónico ya está registrado";
    header("Location: index.php?mensaje=" . urlencode($mensaje));
    exit;
    
  }




  $consulta = "SELECT * FROM usuarios WHERE cedula = '$cedula'";
  $resultado = mysqli_query($conexion, $consulta);


  if (mysqli_num_rows($resultado) > 0) {
    $mensaje = "La cedula ya está registrada";
    header("Location: index.php?mensaje=" . urlencode($mensaje));
    exit;
    
  }

  
  
  $consulta = "INSERT INTO usuarios (nombre, cedula, telefono, email, clave) VALUES ('$nombre', '$cedula', '$telefono', '$email', '$clave')";
  mysqli_query($conexion, $consulta);
  $mensajeok = "Usuario registrado exitosamente";
  
 
  mysqli_close($conexion);

  header("Location: index.php?mensajeok=" . urlencode($mensajeok));
  exit;
?>
