<?php
$cod = $_POST['cod'];
$nombre = $_POST['nombre'];
$ap = $_POST['ap'];
$am = $_POST['am'];
$dni = $_POST['dni'];

session_start();

$_SESSION['cod']=$cod;
$_SESSION['nombre']=$nombre;
$_SESSION['ap']=$ap;
$_SESSION['am']=$am;
$_SESSION['dni']=$dni;
?>