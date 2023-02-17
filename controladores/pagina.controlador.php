<?php

Class ControladorPagina{
		
	/*=============================
		Mostrar contenido Circular
	==============================*/

	static public function ctrMostrarPagina(){

		$tabla = "pagina";

		$respuesta = ModeloPagina::mdlMostrarPagina($tabla);

		return $respuesta;

	}

	}
