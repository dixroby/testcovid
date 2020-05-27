<?php
    require '../../modelo/modelo_medico.php';
    $MM = new Modelo_Medico();

    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $appat = htmlspecialchars($_POST['appat'],ENT_QUOTES,'UTF-8');
    $apmat = htmlspecialchars($_POST['apmat'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    $telefono = htmlspecialchars($_POST['telefono'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');
    $dni = htmlspecialchars($_POST['dni'],ENT_QUOTES,'UTF-8');
    $colegio = htmlspecialchars($_POST['colegio'],ENT_QUOTES,'UTF-8');
    $especialidad = htmlspecialchars($_POST['especialidad'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MM->Registrar_medico($nombre,$appat,$apmat,$direccion,$telefono,$sexo,$dni,$colegio,$especialidad,$estatus);
    echo $consulta;
