<!doctype html>
<html lang="en">

<head>
  <title>Creador de servicios</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/csslogin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <?php
  session_start(); // Inicia la sesión
  $mi_variable = $_SESSION['mi_variable']; // Obtiene el valor de la variable almacenada en la sesión
 
  ?>



  <div class="container-md">
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="../imgs/login.png" class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

            <? ?>
            <form name="iniciocrear" method="POST">


              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control form-control-lg" name="vusuario"
                  disabled=disabled required value="
                  <?php
                  echo $mi_variable
                  
                  ?>" />
                <label class="form-label" for="form3Example3">Correo electronico</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" id="form3Example4" class="form-control form-control-lg" name="vcontra"
                  placeholder="Ingresa tu contraseña" required />
                <label class="form-label" for="form3Example4">contraseña</label>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox que no funciona -->
                <div class="form-check mb-0">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                  <label class="form-check-label" for="form2Example3">
                    recordar contraseña
                  </label>


                  <div class="text-center text-lg-start mt-4 pt-2">
                    <input type="submit" class="btn btn-primary btn-lg"
                      style="padding-left: 2.5rem; padding-right: 2.5rem;" name="btniniciar">Iniciar</button>

                    <?php
                    include("./bd/cons.php");
                    include("./bd/inciador.php");
                    ?>


                  </div>

            </form>
          </div>
        </div>
      </div>

    </section>
  </div>

</body>

</html>