<?php 
	if (!isset($porAjax)) {	require "core/configAPP.php"; }
	 else{ require "../core/configAPP.php"; }
	
	const SQLCat = "SELECT idCategoria, nombreCategoria, urlCategoria, descripcionCategoria, imagenCategoria, idLabel, snippetCategoria FROM categorias"; 
	const SQLProd = "SELECT idProducto, precioProducto, amazonProducto, imagenProducto, descripcionProducto, idLabel, idCategoria, stockProducto FROM productos";
	const SQLabel = "SELECT idLabel, grupoLabel, nombreLabel, descripcionLabel, imgLabel, snippetLabel FROM label";
	
	class Principal extends PDO{
	
		public function __construct() { }
	
		protected function conectar(){
			try {
				$conn = new PDO(SGBD, USER, PASS);
				$conn->exec("SET CHARACTER SET utf8");
				return $conn;
			} catch (Exception $e) { echo "ERROR DE DB: ".$e->getMessage().""; }
		}	
	
		protected function obtener_productos($prod){
			$conectar = self::conectar()->prepare($prod);
			$conectar->execute();
			$productos = $conectar->fetchAll(PDO::FETCH_ASSOC);
			return $productos;
		}
	
		protected function obtener_categorias ($cat){
			$conectar = self::conectar()->prepare($cat);
			$conectar->execute();
			$categorias = $conectar->fetchAll(PDO::FETCH_ASSOC);
			return $categorias;
		}
	
		protected function obtener_etiquetas ($SQLeti){
			$conectar = self::conectar()->prepare($SQLeti);
			$conectar->execute();
			$etiquetas = $conectar->fetchAll(PDO::FETCH_ASSOC);
			return $etiquetas;
		}
	
		protected static function limpiar_cadena($cadena){
			$cadena = str_ireplace("<script>","",$cadena);
			$cadena = str_ireplace("</script>","",$cadena);
			$cadena = str_ireplace("<script src=","",$cadena);	
			$cadena = str_ireplace("<script type=","",$cadena);
			$cadena = str_ireplace("SELECT * FROM","",$cadena);
			$cadena = str_ireplace("DELETE FROM","",$cadena);
			$cadena = str_ireplace("UPDATE FROM","",$cadena);
			$cadena = str_ireplace("INSERT INTO","",$cadena);
			$cadena = str_ireplace("--","",$cadena);
			$cadena = str_ireplace("^","",$cadena);
			$cadena = str_ireplace("==","",$cadena);
			$cadena = str_ireplace("=","",$cadena);
			$cadena = str_ireplace("+","",$cadena);
			$cadena = str_ireplace("[","",$cadena);
			$cadena = str_ireplace("]","",$cadena);
			$cadena = str_ireplace("{","",$cadena);
			$cadena = str_ireplace("}","",$cadena);
			$cadena = str_ireplace("´","",$cadena);
			$cadena = str_ireplace("'","",$cadena);
			$cadena = str_ireplace("*","",$cadena);
			$cadena = trim($cadena); 
			$cadena = stripcslashes($cadena); 
			return $cadena;
		}
	
		protected function encriptar($script){
			$output = FALSE;
			$key = hash('sha256', SECRET_KEY);
			$iv = substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($script, METHOD, $key, 0, $iv);
			$output = base64_encode($output);
			return $output;
		}
	
		protected function desencriptar ($script){
			$key = hash('sha256', SECRET_KEY);
			$iv = substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($script) , METHOD, $key, 0, $iv);
			return $output;
		}
	}
