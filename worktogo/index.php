<!doctype html>
<html>



<head>
	<title>Aulita</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="./login/Style.css?axd">


</head>

<body>
	

	<form method="POST" action="" name="formularioiniciar">
		<p class="LetrasAnimation">Work To Go</p>
		<div class="section">
			<div class="container">
				<div class="row full-height justify-content-center">
					<div class="col-12 text-center align-self-center py-5">
						<div class="section pb-5 pt-5 pt-sm-2 text-center">
							<h6 class="mb-0 pb-3"><span>Iniciar Sesion </span><span>Crear Cuenta</span></h6>
							<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
							<label for="reg-log"></label>
							<div class="card-3d-wrap mx-auto">
								<div class="card-3d-wrapper">
									<div class="card-front">
										<div class="center-wrap">
											<div class="section text-center">
												<h4 class="mb-4 pb-3">Iniciar Sesion</h4>
												<div class="form-group">
													<input type="email" name="IniciarEmail" class="form-style"
														placeholder="Email">
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" name="IniciarContra" class="form-style"
														placeholder="Clave de acceso">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>

												<input type="submit" class="btn mt-4" value="Iniciar Sesion"
													name="btn_iniciarsesion">



												<a>
													<br><br>
													
													<a class="link"  href="recupera.php" >¿Olvidaste tu clave de acceso?</a>
													
												</a></p>
												<?php
												include("./login/con_db.php");
												include("./login/controlador.php");

												?>
											</div>
											<?php
											if (isset($_GET['mensaje'])) {
												$mensaje = $_GET['mensaje'];
												echo "<p class='bad'> $mensaje</p>";
											}
					
											?>
											<?php
											if (isset($_GET['mensajeok'])) {
												$mensajeok = $_GET['mensajeok'];
												echo "<p class='ok'> $mensajeok</p>";
											}
					
											?>
										</div>
									</div>
									<div class="card-back">
										<div class="center-wrap">
											<div class="section text-center">
												<h4 class="mb-3 pb-3">Crear Cuenta</h4>




	</form>

	<form name="formulariocrear" action="login/procesar_formulario.php" method="POST">





		<div class="form-group">
			<input required type="text" name="RNombre" class="form-style" placeholder="Nombre Completo"
				pattern="^[a-zA-Z\s]+$">
			<i class="input-icon uil uil-user"></i>
		</div>

		<div class="form-group mt-2">
			<input required type="text" name="RCedula" class="form-style" placeholder="Cedula">
			<i class="input-icon uil uil-postcard"></i>
		</div>

		<div class="form-group mt-2">
			<input type="tel" name="RTelefono" class="form-style" placeholder="Telefono" pattern="[0-9]{10}">
			<i class="input-icon uil uil-phone"></i>
		</div>
		<div class="form-group mt-2">
			<input required type="email" name="REmail" class="form-style" placeholder="Email">
			<i class="input-icon uil uil-at"></i>
		</div>
		<div class="form-group mt-2">
			<input required type="password" name="RContra" id="Rcontra" class="form-style"
				placeholder="Clave de acceso">
			<i class="input-icon uil uil-lock-alt"></i>
		</div>

		<div class="form-group mt-2">
			<input required type="password" name="CContra" id="Ccontra" class="form-style"
				placeholder="Confirmar Clave">
			<i class="input-icon uil uil-lock-alt"></i>
		</div>


		<input name="btnregistrar" class="btn mt-4" value="Crear Cuenta" type="submit"
			onclick="return validarContraseñas();">






	</form>




	<script>
		function validarContraseñas() {
			var contraseña = document.getElementById('Rcontra').value;
			var confirmacion = document.getElementById('Ccontra').value;
			if (contraseña !== confirmacion) {
				alert("Las contraseñas no coinciden");
				return false;
			}
			return true;
		}
	</script>





	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>







</body>

</html>