<?php
	session_start();
	if(!isset($_SESSION['dni'])){
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Autoevalución UNAMBA</title>
    <!-- <link rel="icon" type="image/png" href="<//?php echo base_url('public/img/costa11.png'); ?>"> -->
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <script src="public/js/bootstrap.js"></script>
</head>

<body>
    <nav style="position: fixed; width: 100%;z-index: 1000;">
        <div class="container-fluid navbar-inverse fixed-top">
            <div class="nav navbar-nav">
                <a class="navbar-brand" href="#">Unamba</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a>sugerencias</a></li>
                <li><a>Ideas</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li><a><b>Bienvenido: </b><?php echo $_SESSION['dni']; ?></a></li>
                <li><a href="controlador/estudiante/controlador_cerrar_session.php"><b>Salir </b></a></li>

            </ul>

        </div>
    </nav>

    <div class="jumbotron">

        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <center>
                    <h1>Eres sospechoso de COVID-19</h1>
                </center>


            </div>
            <div class="col-md-1">

            </div>
        </div>
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-sm-7 col-md-12">
                        <div class="thumbnail">

                            <div class="caption">
                                <p>Debido a tus sintomas y contactos, podrias haber adquirido el COVID-19,
                                    por lo que deberas guardar aislamiento domicialiario por 14 dias desde
                                    el inicio de tus sintomas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-12">
                        <div class="thumbnail">

                            <div class="caption">
                                <p>En caso de ser necesario el personal de salud del centro medico
                                    de la UNAMBA se pondra en contacto.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-sm-6 col-md-10">
                        <div class="thumbnail">
                            <img src="img/tres.jpg" alt="...">
                            <div class="caption">

								<p>Recomendaciones</p>
								<p><a href="controlador/estudiante/controlador_cerrar_session.php" class="btn btn-danger" role="button">Realizar otro test</a></p>
                                <!-- <p><a href="#" class="btn btn-primary" role="button">Ver detalles</a></p> -->
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
<script>
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