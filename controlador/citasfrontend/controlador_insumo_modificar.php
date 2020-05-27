<?php
    require '../../modelo/modelo_insumo.php';
    $MI = new Modelo_Insumo();

    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $insumo = htmlspecialchars($_POST['insumo'],ENT_QUOTES,'UTF-8');
    $stock = htmlspecialchars($_POST['stock'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MI->Modificar_Datos_Insumo($id,$insumo,$stock,$estatus);
    echo $consulta;
