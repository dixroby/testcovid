<?php
	session_start();
	if(isset($_SESSION['dni'])){
		header('Location: pregunta.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sistema de Autoevalución UNAMBA</title>
	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

	<nav style="position: fixed;
  width: 100%;
  z-index: 1000;">
		<div class="container-fluid navbar-inverse fixed-top">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Universidad Nacional Micaela Bastidas de Apurímac</a>
			</div>
		</div>
	</nav>


	<div class="jumbotron">

		<div class="container">

			<div class="">
				<center>
					<h1>Evaluación coronavirus COVID-19</h1>
				</center> <br>
				<p style="justify-content: stretch;">Llama al 106 (SAMU) o al 117 (Essalud) si tienes alguno de estos
					síntomas:

					Sensación de falta de aire o dificultad para respirar en reposo,
					Desorientación o confusión,
					Fiebre mayor a 38°C persistente por más de dos días,
					Dolor en el pecho,
					Coloración azul en los labios (cianosis).</p> <b>

			</div>


			<div class="row">
				<div class="col-md-2">

				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-sm-7 col-md-8">
							<div class="thumbnail">

								<div class="caption">
									<div class="form-group">
										<label for="">Ingrese DNI</label>
										<input value="47556211" type="text" class="form-control" maxlength="8"
											onkeypress="return solonumeros(event)" onpaste="return false" id="txt_Dni" name="txtDni"
											placeholder="escriba su dni" pattern="[0-9]{8}" required>
									</div>  
									<div class="form-group">
										<label for="">Ingrese codigo</label>
										<input type="text" value="051005" class="form-control" maxlength="6"
											onkeypress="return solonumeros(event)" id="txt_Codigo" onpaste="return false"
											name="txtCodigo" placeholder="escriba su codigo" pattern="[0-9]{8}"
											required>
									</div>
									<div class="form-group">
										<label for="">Ingrese codigo</label>
										<input id="tx_tTelefono" type="text" class="form-control" maxlength="6"onkeypress="return solonumeros(event)" onpaste="return false" name="txtCodigo" placeholder="escriba su codigo" pattern="[0-9]{8}" required>
									</div>
									
									<p><a class="btn btn-primary btn-lg" onclick="VerificarEstudiante()" role="button">Empezar
											Evaluación</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-sm-6 col-md-10">
							<div class="thumbnail">
								<img src="img/tres.jpg" alt="...">
								<div class="caption">

									<p>Unamba Licenciada</p>
									<!-- <p><a href="#" class="btn btn-primary" role="button">Ver detalles</a></p> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-md-2">

		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-sm-6 col-md-12">
					<div class="thumbnail">
						<img src="img/tres.jpg" alt="...">
						<div class="caption">
							<h3>sugerencias</h3>
							<p>Formas de protegerte ante el coronavirus</p>
							<p><a href="#" class="btn btn-primary" role="button">Ver detalles</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-6 col-md-8">
					<div class="thumbnail">
						<img src="img/dos.jpg" alt="...">
						<div class="caption">
							<h3>Ideas</h3>
							<p>yo me quedo en casa</p>
							<p><a href="#" class="btn btn-primary" role="button">ver datalles</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

 <!--===============================================================================================-->
 <script src="vendor/sweetalert2/sweetalert2.js"></script>
    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    
    <script src="js/estudiante.js"></script>

<style>
	.swal2-container:not(.swal2-top):not(.swal2-top-start):not(.swal2-top-end):not(.swal2-top-left):not(.swal2-top-right):not(.swal2-center-start):not(.swal2-center-end):not(.swal2-center-left):not(.swal2-center-right):not(.swal2-bottom):not(.swal2-bottom-start):not(.swal2-bottom-end):not(.swal2-bottom-left):not(.swal2-bottom-right):not(.swal2-grow-fullscreen) > .swal2-modal{
    font-size: 15px;
}
</style>

<script>
	txt_Dni.focus();
	//VALIDACIONES
	function solonumeros(e) {
		key = e.keyCode || e.which;
		teclado = String.fromCharCode(key);
		numeros = "0123456789";
		especiales = "8-37-38-46";
		teclado_especial = false;
		for (var i in especiales) {
			if (key == especiales[i]) {
				teclado_especial = true;
			}
		}
		if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
			return false;
		}
	}
	function sololetras(e) {
		key = e.keyCode || e.which;
		teclado = String.fromCharCode(key).toLowerCase();
		letras = " abcdefghijklmnñopqrstuvwxyz";
		especiales = "8-37-38-46";
		teclado_especial = false;
		for (var i in especiales) {
			if (key == especiales[i]) {
				teclado_especial = true;
				break;
			}
		}
		if (letras.indexOf(teclado) == -1 && !teclado_especial) {
			return false;
		}

	}
</script>