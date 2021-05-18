<?php 
include './modelo/principal-modelo.php';
try {
class paginaControlador extends Principal{

	function __construct() { }

	function mainControlador (){
		$consulta = Principal::obtener_categorias(SQLCat);
		return $consulta;
	}
	
	function consultaCatControlador ($sqlParam, $idCatProd){
		$this->sqlParam = $sqlParam;
		$this->idCatProd = $idCatProd;
		$categorias = SQLCat.$this->sqlParam.$this->idCatProd;
		$consultaCat = Principal::obtener_categorias($categorias);
		return $consultaCat;
	}

	function consultaProdControlador ($idCatProd){
		if( isset($this->idCatProd) ){
			$this->idCatProd = $idCatProd;
			$pro = Principal::limpiar_cadena($idCatProd);
			$conditionCat = " WHERE idCategoria=";
			$productos = SQLProd.$conditionCat.$pro; }	
		else{ $productos = SQLProd; }
		$consultaProd = Principal::obtener_productos($productos);
		return $consultaProd;
	}

	function consultaEtiControlador ($sqlParam){
		$this->sqlParam = $sqlParam;
		$SQLeti = SQLabel.$this->sqlParam;
		$consultaEti = Principal::obtener_etiquetas($SQLeti);
		return $consultaEti;
	}

	function cosultaPagControlador($palabra){
		$this->palabra = $palabra;
		$filtro = " WHERE descripcionProducto LIKE '%".$palabra."%'";
		$filtroProd = SQLProd.$filtro;
		$consultaProd = Principal::obtener_productos($filtroProd);	
		return $consultaProd;
	}

	function clearChain($cadena){
		$this->cadena = $cadena;
		$correcto = Principal::limpiar_cadena($cadena);	
		return $correcto;	
	}
}

} catch (Exception $e) {
	echo "mensaje: ", $e->getMessage();
}