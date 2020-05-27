<?php
    require '../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    $dni = htmlspecialchars($_POST['dni'],ENT_QUOTES,'UTF-8');
    $contra = htmlspecialchars($_POST['pass'],ENT_QUOTES,'UTF-8');
    $tel = htmlspecialchars($_POST['tel'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->VerificarEstudiante($dni,$contra,$tel);
    $data = json_encode($consulta);
    if(count($consulta)>0){
        echo $data;
    }else{
        echo 0;
    }

?>