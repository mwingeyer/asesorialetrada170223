<?php

Class ControladorDictamenes{
		
	/*=============================
		Mostrar contenido Dictamenes
	==============================*/
	static public function ctrMostrarDictamenes(){
		$tabla = "dictamenes";
		$respuesta = ModeloDictamenes::mdlMostrarDictamenes($tabla);
		return $respuesta;
	}

	/*=============================================
		Mostrar contenido Dictamenes patara buscador
	==============================================*/
	static public function ctrMostrarDictamenesBusca($desde, $cantDic){
		$tabla = "dictamenes";
		$respuesta = ModeloDictamenes::mdlMostrarDictamenesBusca($tabla,$desde,$cantDic);
		return $respuesta;
	}

	/*=============================
		Mostrar total de Dictamenes
	==============================*/
	static public function ctrMostrarTotalDictamenes(){
		$tabla = "dictamenes";
		$respuesta = ModeloDictamenes::mdlMostrarTotalDictamenes($tabla);
		return $respuesta;
	}
}