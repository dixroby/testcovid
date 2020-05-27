<?php
    require '../../modelo/modelo_insumo.php';
    $MI = new Modelo_Insumo();

    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $stock = htmlspecialchars($_POST['stock'],ENT_QUOTES,'UTF-8');
    $status = htmlspecialchars($_POST['status'],ENT_QUOTES,'UTF-8');
    $consulta = $MI->Registrar_Insumo($nombre,$stock,$status);
    echo $consulta;
