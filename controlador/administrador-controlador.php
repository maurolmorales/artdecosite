<?php 
	require_once "../modelo/administrador-modelo.php";

  class administradorControlador extends administradorModelo {
		
		function __construct(){ }

		public function llave(){
			if(!empty($_POST["clave"])){ $clave = $_POST["clave"]; 

				switch ($clave){
					case "agregarCategoria":
						$rectorModelo = new administradorModelo();
						$rectorModelo->agregarCategoria();
						break;

					case 'consultarCategoria':
						$rectorModelo = new administradorModelo();
						$rectorModelo->consultarCategoria();
						break;

					case 'consultarProductos':
						$rectorModelo = new administradorModelo();
						$rectorModelo->consultarProductos();
						break;

					case 'modificarCategoria':
						$rectorModelo = new administradorModelo();
						$rectorModelo->modificarCategoria();
						break;

					case 'eliminarCategoria':
						$rectorModelo = new administradorModelo();
						$rectorModelo->eliminarCategoria();
						break;	

					case 'agregarProducto':
						$rectorModelo = new administradorModelo();
						$rectorModelo->agregarProducto();
						break;

					case 'modificarProducto':
						$rectorModelo = new administradorModelo();
						$rectorModelo->modificarProducto();
						break;	

					case 'eliminarProducto':
						$rectorModelo = new administradorModelo();
						$rectorModelo->eliminarProducto();
						break;	

					case 'selectLabel':
						$rectorModelo = new administradorModelo();
						$grupoLabel = $_POST['grupoLabel'];
						$rectorModelo->selectLabel($grupoLabel);
						break;

					case 'traerCategoriaAlPanel':
						$rectorModelo = new administradorModelo();
						$idCat = $_POST['idCat'];
						$rectorModelo->traerCategoriaAlPanel($idCat);
						break;

					case 'traerProductosAlPanel':
						$rectorModelo = new administradorModelo();
						$idProd = $_POST['idProducto'];
						$rectorModelo->traerProductosAlPanel($idProd);
						break;

					case 'prueba':
						echo "pruebaaaaaaaa";
						break;						

					case 'cerrarSesion':
						session_start(['name'=>'ADS']);
						if (isset($_SESSION['token_ads']) && isset($_SESSION['usuario_ads'])) {
							session_unset();
							session_destroy();
						}
				    break;

					default:
						echo "por si no funca";
						break;
				}			
			} else{ } 		
		}
  }

  $adminFunction = new administradorControlador(); 
  $adminFunction->llave();
