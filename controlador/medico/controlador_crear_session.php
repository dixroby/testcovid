
<?php
$idmedico = $_POST['idmed'];
$medico_nombre = $_POST['user'];
$medico_apepat = $_POST['rol'];
$medico_apemat = $_POST['user'];
$especialidad = $_POST['rol'];

session_start();

$_SESSION['S_IDMEDICO']=$idmedico;
$_SESSION['S_MEDICO']=$medico_nombre;
$_SESSION['S_MEDICOAP']=$medico_apepat;
$_SESSION['S_MEDICOAM']=$medico_apemat;
$_SESSION['S_ESPECIALIDAD']=$especialidad;
?>