<?php

require_once "controladores/plantilla.controlador.php";

require_once "controladores/pagina.controlador.php";
require_once "controladores/circular.controlador.php";
require_once "controladores/dictamenes.controlador.php";

require_once "modelos/pagina.modelo.php";
require_once "modelos/circular.modelo.php";
require_once "modelos/dictamenes.modelo.php";



//Load Composer's autoloader
$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();
