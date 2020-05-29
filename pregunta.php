<?php
	session_start();
	if(!isset($_SESSION['dni'])){
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    .swal2-container:not(.swal2-top):not(.swal2-top-start):not(.swal2-top-end):not(.swal2-top-left):not(.swal2-top-right):not(.swal2-center-start):not(.swal2-center-end):not(.swal2-center-left):not(.swal2-center-right):not(.swal2-bottom):not(.swal2-bottom-start):not(.swal2-bottom-end):not(.swal2-bottom-left):not(.swal2-bottom-right):not(.swal2-grow-fullscreen)>.swal2-modal {
        font-size: 15px;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Autoevalución UNAMBA</title>
    <!-- <link rel="icon" type="image/png" href="<//?php echo base_url('public/img/costa11.png'); ?>"> -->
    <link rel="stylesheet" href="public/css/bootstrap.css">
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

    <div class="jumbotron" id="pre1">

        <input type="text" hidden id="txtdniidid" value="<?php echo $_SESSION['dni']; ?>">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>¿Qué síntomas tienes?</h2>
                    </div>
                    <div class="panel-body">
                        <h4>Marca tus síntomas. Si no tienes ninguno, marca la opción No tengo ningún síntoma y continúa
                            a la siguiente pantalla.</h4>
                        <form action="">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="p11">
                                <label for="1" class="form-check-label">
                                    <h4>Disminución del gusto o del olfato</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p12">
                                <label for="2" class="form-check-label">
                                    <h4>Tos</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p13">
                                <label for="3" class="form-check-label">
                                    <h4>Dolor de garganta</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p14">
                                <label for="4" class="form-check-label">
                                    <h4>Dificultad para respirar</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p15">
                                <label for="5" class="form-check-label">
                                    <h4>Congestión nasal</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p16">
                                <label for="6" class="form-check-label">
                                    <h4>Fiebre</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p17">
                                <label for="7" class="form-check-label">
                                    <h4>No tengo ninún síntoma</h4>
                                </label>

                            </div>
                            <hr>
                            <h4>¿Ha estado fuera del Perú recientemente en un rango de 14 días antes de los inicios de
                                los síntomas?</h4>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="p21" name="default2">
                                <label for="si" class="custom-control-label">
                                    <h4>Sí</h4>
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="p22" name="default2">
                                <label for="no" class="custom-control-label">
                                    <h4>No</h4>
                                </label>
                            </div>

                            <nav aria-label="...">
                                <ul class="pager" style="font-size:16px;">

                                    <li><a href="controlador/estudiante/controlador_cerrar_session.php"><span
                                                aria-hidden="true">&larr;</span> <b>Atras</b></a></li>
                                    <li><a href="#pre2"><b>Siguiente</b> <span aria-hidden="true">&rarr;</span></a>

                                    </li>
                                </ul>
                            </nav>
                        </form>
                    </div>
                </div>

                <!-- <p><a class="btn btn-primary btn-lg" href="pregunta1.html" role="button">Continuar</a></p>
                              -->
            </div>
        </div>
    </div>

    <div class="jumbotron" id="pre2">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Situaciones de riesgo</h2>
                    </div>
                    <div class="panel-body">

                        <form action="">
                            <h4>¿En los últimos 14 días, has tenido contacto con un caso confirmado de coronavirus
                                COVID-19?</h4>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="p31" name="default">
                                <label for="1" class="custom-control-label">
                                    <h4>Sí</h4>
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="p32" name="default">
                                <label for="2" class="custom-control-label">
                                    <h4>No</h4>
                                </label>
                            </div>
                            <hr>
                            <h4>¿En los últimos 14 días, te has desplazado a un distrito diferente al de tu residencia?
                            </h4>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="p41" name="default1">
                                <label for="3" class="custom-control-label">
                                    <h4>Sí</h4>
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="p42" name="default1">
                                <label for="4" class="custom-control-label">
                                    <h4>No</h4>
                                </label>
                            </div>
                            <hr>
                            <h4>¿Has estado en contacto con algun centro de estabelcimiento de salud que atienda casos
                                de Covid-19?</h4>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="p51" name="default2">
                                <label for="5" class="custom-control-label">
                                    <h4>Sí</h4>
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="p52" name="default2">
                                <label for="6" class="custom-control-label">
                                    <h4>No</h4>
                                </label>
                            </div>

                            <nav aria-label="...">
                                <ul class="pager">

                                    <li><a href="#pre1"><span aria-hidden="true">&larr;</span> <b>Atras</b></a></li>
                                    <li><a href="#pre3">Siguiente <span aria-hidden="true">&rarr;</span></a>

                                    </li>
                                </ul>
                            </nav>
                        </form>
                    </div>
                </div>

                <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Continuar</a></p>
                              -->
            </div>
        </div>
    </div>


    <div class="jumbotron" id="pre3">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Otras condiciones</h2>
                    </div>
                    <div class="panel-body">

                        <form action="">
                            <h4>¿Tienes alguna de las siguientes enfermedades o condiciones?</h4>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="p61">
                                <label for="1" class="form-check-label">
                                    <h4>Obesidad</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p62">
                                <label for="2" class="form-check-label">
                                    <h4>Enfermedad pulmonar crónica</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p63">
                                <label for="3" class="form-check-label">
                                    <h4>Asma</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p64">
                                <label for="4" class="form-check-label">
                                    <h4>Diabetes</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p65">
                                <label for="5" class="form-check-label">
                                    <h4>Hipertención arterial</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p66">
                                <label for="6" class="form-check-label">
                                    <h4>Enfermedad o tratamiento inmunosupresor</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p67">
                                <label for="7" class="form-check-label">
                                    <h4>Enfermedad cardiovascular (enfermedad coronaria, arritima o insuficiencia
                                        cardiaca, enfermedad vascular periférica, etc.)</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p68">
                                <label for="8" class="form-check-label">
                                    <h4>Insuficiencia renal o crónica</h4>
                                </label><br>
                                <input type="checkbox" class="form-check-input" id="p69">
                                <label for="9" class="form-check-label">
                                    <h4>Cáncer</h4>
                                </label>

                            </div>
                            <hr>
                            <h4>¿En los últimos 14 días, te has desplazado a un distrito diferente al de tu residencia?
                            </h4>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="p71" name="default1">
                                <label for="10" class="custom-control-label">
                                    <h4>Sí</h4>
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="p72" name="default1">
                                <label for="11" class="custom-control-label">
                                    <h4>No</h4>
                                </label>
                            </div>

                            <nav aria-label="...">
                                <ul class="pager">

                                    <li><a href="#pre2"><span aria-hidden="true">&larr;</span> <b>Atras</b></a></li>
                                    <li><a href="#pre4">Siguiente <span aria-hidden="true">&rarr;</span></a>

                                    </li>
                                </ul>
                            </nav>
                        </form>
                    </div>
                </div>

                <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Continuar</a></p>
                              -->
            </div>
        </div>
    </div>

    <div class="jumbotron" id="pre4">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Otras condiciones</h2>
                    </div>
                    <div class="panel-body">

                        <form action="">
                            <h4>¿Vives en la misma casa con alguna persona de los siguientes grupos de riesgos?</h4>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="p81">
                                <label for="1" class="form-check-label">
                                    <h4>Adulto mayor</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p82">
                                <label for="2" class="form-check-label">
                                    <h4>Bebé recién nacido o menor de 6 meses</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p83">
                                <label for="3" class="form-check-label">
                                    <h4>Niño</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p84">
                                <label for="4" class="form-check-label">
                                    <h4>Gestante</h4>
                                </label><br>

                                <input type="checkbox" class="form-check-input" id="p85">
                                <label for="5" class="form-check-label">
                                    <h4>Familiar con enfermedad crónica (enfermedad cardiovascular, enfermedad pulmonar
                                        crónica, diabetes, hipertensión, inmunodepresión o cáncer)</h4>
                                </label><br>

                            </div>
                            <hr>
                            <h4>¿Con cuantas personas vives?</h4>
                            <div class="form-group">
                                <input type="text" class="form-control" maxlength="8"
                                    onkeypress="return solonumeros(event)" onpaste="return false" name="txtDni"
                                    placeholder="ejemplo:4" pattern="[0-9]{8}" required>
                            </div>
                            <p>Al enviar tus datos, aceptas que el Ministerio de Salud se ponga en contacto contigo para
                                hacerle seguimiento a tu caso y fortalecer la estrategia del Estado Peruano frente al
                                COVID-19 para protegerte a ti y todos los peruanos. La confidencialidad de tus datos es
                                importante para nosotros, por lo que cumplimos con las normativas de protección de datos
                                establecidas.</p>

                            <nav aria-label="...">
                                <ul class="pager">
                                    <li><a href="pre3"><span aria-hidden="true">&larr;</span> Atras</a></li>
                                    <li><a class="btn btn-link" onclick="valores()">Finalizar Test <span
                                                aria-hidden="true">&rarr;</span></a></li>
                                </ul>
                            </nav>
                        </form>
                    </div>
                </div>
                <a>probar</a>

                <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Continuar</a></p>
                              -->
            </div>
        </div>
    </div>
</body>

</html>
<script src="js/estudiante.js"></script>

<script src="vendor/sweetalert2/sweetalert2.js"></script>

<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
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