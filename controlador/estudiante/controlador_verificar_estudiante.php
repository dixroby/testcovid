<?php
    require '../../modelo/modelo_estudiante.php';


    $dni = $_POST['dni'];
    $con = $_POST['con'];
    
    session_start();
    
    $_SESSION['dni']=$dni;
    $_SESSION['con']=$con;

    $MU = new Modelo_Estudiante();
    $dni = htmlspecialchars($_POST['dni'],ENT_QUOTES,'UTF-8');
    $contra = htmlspecialchars($_POST['con'],ENT_QUOTES,'UTF-8');
    $tel = htmlspecialchars($_POST['tel'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->VerificarEstudiante($dni,$contra,$tel);
    $data = json_encode($consulta);
    if(count($consulta)>0){
        echo $data;
    }else{
        echo 0;
    }

    

?>