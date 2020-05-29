<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    
    $dni = htmlspecialchars($_POST['dni'],ENT_QUOTES,'UTF-8');
    $estado = htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->Modificar_Estatus_ESTUDIANTE_NO($dni,$estado);
    echo $consulta;