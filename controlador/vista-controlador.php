<?php 
require './modelo/vista-modelo.php'; 

class VistaControlador extends VistaModelo	{
	public function obtener_plantilla_ctrl(){ 
		return require './vista/plantilla.php';
	}

	public function obtener_vista_ctrl(){ 
		if(isset($_GET['mlm'])){
			$ruta = explode('/', $_GET['mlm']); 
			$respuesta =self::obtener_vista_mod($ruta[0]); 
		}	else { $respuesta = "./vista/contenidos/home-view.php"; }
		return $respuesta;	
	}	
}





