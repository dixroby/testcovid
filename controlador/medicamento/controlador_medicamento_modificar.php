<?php
    require '../../modelo/modelo_medicamento.php';
    $MI = new Modelo_Medicamento();

    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $medicamento = htmlspecialchars($_POST['medicamento'],ENT_QUOTES,'UTF-8');
    $alias = htmlspecialchars($_POST['alias'],ENT_QUOTES,'UTF-8');
    $stock = htmlspecialchars($_POST['stock'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MI->Modificar_Datos_Insumo($id,$medicamento,$alias,$stock,$estatus);
    echo $consulta;