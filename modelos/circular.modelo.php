<?php

require_once "conexion.php";

class ModeloCircular{
    
    /**=====================================
     Mostrar Circulares
    ======================================*/
    static public function mdlMostrarCirculares($tabla,$cantidad){
    	$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla ORDER BY anio DESC LIMIT $cantidad");
    	$stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;
    }

    /**=====================================
     Mostrar Circulares Buscador
    ======================================*/
    static public function mdlMostrarCircularesBusca($tabla,$desde,$cantidad){
        $stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla ORDER BY anio DESC LIMIT $desde, $cantidad");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;
    }

    /*=============================
        Mostrar total de Circulares
    ==============================*/
     static public function mdlMostrarTotalCirculares($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;
    }

    /*=============================
        Buscador
    ==============================*/
    static public function mdlBuscador($tabla, $busqueda, $desde, $cantidad){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE numero like '%$busqueda%' OR acronimo like '%$busqueda%' OR anio like '%$busqueda%' OR temageneral like '%$busqueda%' OR caracter like '%$busqueda%' OR extracto like '%$busqueda%' ORDER BY anio DESC LIMIT $desde, $cantidad");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close;
        $stmt = null;
    }

    /*=============================
       Total Buscador
    ==============================*/
    static public function mdlTotalBuscador($tabla, $busqueda){
         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE numero like '%$busqueda%' OR acronimo like '%$busqueda%' OR anio like '%$busqueda%' OR temageneral like '%$busqueda%' OR caracter like '%$busqueda%' OR extracto like '%$busqueda%' ORDER BY anio DESC");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close;
        $stmt = null;
    }
}
