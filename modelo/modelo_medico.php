<?php
    class Modelo_Medico{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        function listar_Medico(){
            $sql = "call SP_LISTAR_MEDICO";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function Registrar_medico($nombre,$appat,$apmat,$direccion,$telefono,$sexo,$dni,$colegio,$especialidad,$estatus){
            $sql = "call SP_REGISTRAR_DOCTOR('$nombre','$appat','$apmat','$direccion','$telefono','$sexo','$dni','$colegio','$especialidad','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]); 
				}
				$this->conexion->cerrar();
			}
        }
        
        function Modificar_Datos_Paciente($id,$nombre,$appat,$apmat,$direccion,$telefono,$sexo,$dni,$estatus){
            $sql = "call SP_MODIFICAR_DATOS_PACIENTES('$id','$nombre','$appat','$apmat','$direccion','$telefono','$sexo','$dni','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
        }

        function listar_combo_especialidad(){
            $sql = "call SP_LISTAR_COMBO_ESPECIALIDAD()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}
		
    }
