<?php

Class ControladorCircular{
		
	/*=============================
		Mostrar contenido Circular
	==============================*/
	static public function ctrMostrarCirculares($cantidad){
		$tabla = "circulares";
		$respuesta = ModeloCircular::mdlMostrarCirculares($tabla,$cantidad);
		return $respuesta;
	}

	/*=============================================
		Mostrar contenido Circular patara buscador
	==============================================*/
	static public function ctrMostrarCircularesBusca($desde, $cantidad){
		$tabla = "circulares";
		$respuesta = ModeloCircular::mdlMostrarCircularesBusca($tabla,$desde,$cantidad);
		return $respuesta;
	}

	/*=============================
		Mostrar total de Circulares
	==============================*/
	static public function ctrMostrarTotalCirculares(){
		$tabla = "circulares";
		$respuesta = ModeloCircular::mdlMostrarTotalCirculares($tabla);
		return $respuesta;
	}

	/*=============================
		Buscador
	==============================*/
	static public function ctrBuscador($busqueda, $desde, $cantidad){
		$tabla = "circulares";
		$respuesta = ModeloCircular::mdlBuscador($tabla, $busqueda, $desde, $cantidad);
		return $respuesta;
	}

	/*=============================
		Total Buscador
	==============================*/
	static public function ctrTotalBuscador($busqueda){
		$tabla = "circulares";
		$respuesta = ModeloCircular::mdlTotalBuscador($tabla, $busqueda);
		//echo '<pre>'; print_r($respuesta); echo '</pre>';
		return $respuesta;
	}
}


