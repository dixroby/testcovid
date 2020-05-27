<?php
    require '../../modelo/modelo_especialidad.php';
    $MI = new Modelo_Especialidad();

    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $status = htmlspecialchars($_POST['status'],ENT_QUOTES,'UTF-8');
    $consulta = $MI->Registrar_Especialidad($nombre,$status);
    echo $consulta;
