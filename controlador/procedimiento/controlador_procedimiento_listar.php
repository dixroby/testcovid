<?php
    require '../../modelo/modelo_procedimiento.php';
    
    $MU = new Modelo_Procedimiento();
    $consulta = $MU->listar_procedimiento();
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