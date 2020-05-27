<?php
    require '../../modelo/modelo_medico.php';
    $MI = new Modelo_Medico();

    $consulta = $MI->listar_Medico();
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