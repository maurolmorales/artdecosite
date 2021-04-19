<?php 
include_once './core/configGral.php';
require_once './controlador/vista-controlador.php';

$plantilla = new VistaControlador();
$plantilla->obtener_plantilla_ctrl();