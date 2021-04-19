<?php 
	include './controlador/pagina-controlador.php';
	$conditionCat = " WHERE idCategoria=";
	$MainFunction = new paginaControlador();
	$consultaCat = $MainFunction->consultaCatControlador($conditionCat, $idCategoriaPagina);
	$consultaProd = $MainFunction->consultaProdControlador($idCategoriaPagina);

	$main = './vista/modulos/main-productos.php';

	foreach ($consultaCat as $key => $value) {
		$nombreCategoria = $value['nombreCategoria'];
		$descripcionCategoria = $value['descripcionCategoria'];
		$urlCategoria = $value['urlCategoria'];
		$imagenCategoria = $value['imagenCategoria'];
		$idLabel = $value['idLabel'];
	}	
	
	$metaDescripcion = substr($descripcionCategoria, 0, 157);
	$metaType = "article";
	$metaTitle = "$nombreCategoria en Art Decó";
	$metaImage = "img/categorias/".$imagenCategoria;
	$metaUrl = SERVERURL.$urlCategoria;
	$canonical = $metaUrl;
	$subtitulo =$nombreCategoria." ­­­|| ";