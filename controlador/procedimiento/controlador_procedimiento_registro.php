<?php
    require '../../modelo/modelo_procedimiento.php';

    $MP = new Modelo_Procedimiento();
    $procedimiento = htmlspecialchars($_POST['procedimiento'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Registrar_Procedimiento($procedimiento,$estatus);
    echo $consulta;
