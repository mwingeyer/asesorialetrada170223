<?php

require_once "conexion.php";

class ModeloPagina{
    
    /**=====================================
     Mostrar contenido
    ======================================*/

    static public function mdlMostrarPagina($tabla){

    	$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla");

    	$stmt -> execute();
        
        return $stmt -> fetch();

        $wtmt -> close();

        $stmt = null;

    }
  }
