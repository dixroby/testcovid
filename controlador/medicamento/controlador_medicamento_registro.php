<?php
    require '../../modelo/modelo_medicamento.php';
    $MI = new Modelo_Medicamento();

    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $alias = htmlspecialchars($_POST['alias'],ENT_QUOTES,'UTF-8');
    $stock = htmlspecialchars($_POST['stock'],ENT_QUOTES,'UTF-8');
    $status = htmlspecialchars($_POST['status'],ENT_QUOTES,'UTF-8');
    $consulta = $MI->Registrar_Medicamento($nombre,$alias,$stock,$status);
    echo $consulta;
