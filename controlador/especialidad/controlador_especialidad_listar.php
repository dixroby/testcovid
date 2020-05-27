<?php
    require '../../modelo/modelo_especialidad.php';
    $MI = new Modelo_Especialidad();

    $consulta = $MI->listar_Especialidad();
    if($consulta){
        echo json_encode($consulta);
    }else{
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }

?>