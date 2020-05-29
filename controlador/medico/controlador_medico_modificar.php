<?php
    require '../../modelo/modelo_medico.php';
    $MI = new Modelo_Medico();

    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $appat = htmlspecialchars($_POST['appat'],ENT_QUOTES,'UTF-8');
    $apmat = htmlspecialchars($_POST['apmat'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    $telefono = htmlspecialchars($_POST['telefono'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');
    $dni = htmlspecialchars($_POST['dni'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Modificar_Datos_Paciente($id,$nombre,$appat,$apmat,$direccion,$telefono,$sexo,$dni,$estatus);
    echo $consulta;
