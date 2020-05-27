<?php
    require '../../modelo/modelo_especialidad.php';
    
    $MI = new Modelo_Especialidad();
    $id = htmlspecialchars($_POST['idmedico'],ENT_QUOTES,'UTF-8');
    $consulta = $MI->VerificarMedico($id);
    $data = json_encode($consulta);
    if(count($consulta)>0){
        echo $data;
    }else{
        echo 0;
    }

?>