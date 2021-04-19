<?php 
	include './controlador/pagina-controlador.php';
	$MainFunction = new paginaControlador();
	$consultaCat = $MainFunction->mainControlador();

	$metaDescripcion = "Venta de artículos para decorar y ambientar con estilo. 
	Vestidos de época elegantes y alegres. Libros, pinturas, música y todo lo referido al Art Deco.";
	$metaType = "website";
	$metaTitle = "Tienda online de artículos y regalos en Art Decó";
	$metaImage = "img/logo.jpg";
	$metaUrl = WEBPAGE;
	$main = './vista/modulos/main-home.php';
	$subtitulo = "Tienda online de artículos estilo Art Deco";
	$canonical = $metaUrl;