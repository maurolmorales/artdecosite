<?php  
include_once './modelo/login-modelo.php';

class loginControlador extends loginModelo {
	
	public function iniciar_sesion_controlador(){

		if ($_POST['nombreUsuario'] =="" || $_POST['claveUsuario']=="") {
			echo "<script>alert('Ingrese los datos')</script>";	
		} else{
				$usuario = self::clearChain($_POST['nombreUsuario']);	
				$clave = $_POST['claveUsuario'];
				$datosLogin = ["usuario"=>$usuario, "clave"=>$clave];
				$datosCuenta = loginModelo::iniciar_sesion_modelo($datosLogin); 
				
				if ($datosCuenta->rowCount()== 1) {
					$rowData = $datosCuenta->fetch();
					$_SESSION['name'] = "ADS";
					$_SESSION['usuario_ads'] = $rowData['nombreUsuario'];
					$_SESSION['token_ads'] = md5(uniqid(mt_rand(),true));
					echo "<script>window.location.href ='".SERVERURL."admin' </script>";

				} else{ 
						echo "<script>alert('datos incorrectos')</script>"; 
						// session_start(['name'=>'ADS']);
						// session_unset();
						// session_destroy();
						//exit();
					}
			}
	}

	public function clearChain($cadena){
		$this->cadena = $cadena;
		$correcto = Principal::limpiar_cadena($cadena);	
		return $correcto;	
	}
}

