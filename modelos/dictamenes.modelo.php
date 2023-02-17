<?php

require_once "conexion.php";

class ModeloDictamenes{
    
    /**=====================================
     Mostrar Dictamenes
    ======================================*/
    static public function mdlMostrarDictamenes($tabla){
    	$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla ORDER BY anio DESC");
    	$stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;
    }

     /**=====================================
     Mostrar Dictamenes Buscador
    ======================================*/
    static public function mdlMostrarDictamenesBusca($tabla,$desde,$cantidad){
        $stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla ORDER BY anio DESC LIMIT $desde, $cantidad");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;
    }

    /*=============================
        Mostrar total de Dictamenes
    ==============================*/
     static public function mdlMostrarTotalDictamenes($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;
    }
}