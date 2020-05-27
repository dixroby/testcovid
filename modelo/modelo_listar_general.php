<?php 
require_once("conexion.php");

class Estudiante extends Conexion{

    public function __construct() {
        //hace referencia a la clase
        parent:: __construct();
    }   
    public function listaEstudiantes(){

        $resultado = $this->con->query("select * from estudiante");

        //obtengo los datos en un arreglo
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function listaEstudiantesSP(){

        $resultado = $this->con->query("CALL sp_listaestudiantes");

        //obtengo los datos en un arreglo
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}