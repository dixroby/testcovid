<?php
    require '../../modelo/modelo_procedimiento.php';

    $MP = new Modelo_Procedimiento();
    $procedimientoid = htmlspecialchars($_POST['procedimientoid'],ENT_QUOTES,'UTF-8');
    $procedimiento = htmlspecialchars($_POST['procedimiento'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Modificar_Datos_Procedimiento($procedimientoid,$procedimiento,$estatus);
    echo $consulta;
