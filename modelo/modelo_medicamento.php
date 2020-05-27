<?php
    class Modelo_Medicamento{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        function listar_Medicamento(){
            $sql = "call SP_LISTAR_MEDICAMENTO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function Registrar_Medicamento($nombre,$alias,$stock,$status){
            $sql = "call SP_REGISTRAR_MEDICAMENTO('$nombre','$alias','$stock','$status')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]); 
				}
				$this->conexion->cerrar();
			}
        }
        
        function Modificar_Datos_Insumo($id,$medicamento,$alias,$stock,$estatus){
            $sql = "call SP_MODIFICAR_DATOS_MEDICAMENTO('$id','$medicamento','$alias','$stock','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
			}else{
				return 0;
			}
        }
		
    }
