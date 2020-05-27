<?php
    require '../../modelo/modelo_especialidad.php';
    $MI = new Modelo_Especialidad();

    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MI->Modificar_Datos_Especialidad($id,$nombre,$estatus);
    echo $consulta;
