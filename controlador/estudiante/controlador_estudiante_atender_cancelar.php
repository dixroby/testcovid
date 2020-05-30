<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->Atender_Estudiante_Cancelar($id);
    echo $consulta;
