<?php
    require '../../modelo/modelo_medicamento.php';
    $MI = new Modelo_Medicamento();

    $consulta = $MI->listar_Medicamento();
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