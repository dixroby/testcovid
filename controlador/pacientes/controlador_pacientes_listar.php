<?php
    require '../../modelo/modelo_pacientes.php';
    $MI = new Modelo_Pacientes();

    $consulta = $MI->listar_Pacientes();
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