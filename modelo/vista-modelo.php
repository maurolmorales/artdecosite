<?php 	

class VistaModelo {
	protected static function obtener_vista_mod ($vistas){
		
		$listaBlanca=array("home", "index", "prueba", "productos", "login","admin", "consulta", "politicaprivacidad", "politicacookies", "avisolegal", "404");
		$listaProductos = array("poster", "collares", "vestidos", "aretes", "figuras", "lamparas", "libros","espejos", "anillos", "musica", "reloj_pulsera", "papel", "maquillaje", "electronica", "relojes", "ropa_de_cama", "alfombras", "cortinas", "grifo", "accesorios", "pulsera");
		$listaEtiquetas = array("cocina", "baño", "boda", "dormitorio", "fiesta", "regalos", "hogar", "negocio", "mujer", "hombre");

			if (in_array($vistas, $listaBlanca, true)|| in_array($vistas, $listaProductos, true)|| in_array($vistas, $listaEtiquetas)) { 
				if (is_file("./vista/contenidos/".$vistas."-view.php")) { 
					$content = "./vista/contenidos/".$vistas."-view.php"; }
					elseif (is_file("./vista/productos/".$vistas."-view.php") ) {	
						$content = "./vista/productos/".$vistas."-view.php"; }
						elseif (is_file("./vista/etiquetas/".$vistas."-view.php") ) {	
						$content = "./vista/etiquetas/".$vistas."-view.php";	}
							elseif ( $vistas=="index" || $vistas=="home" ) {
								$content = "./vista/contenidos/home-view.php"; }
								else{ $content = "./vista/contenidos/404-view.php"; }
			} else{ $content = "./vista/contenidos/404-view.php";	}
		return $content;	
	}	
}