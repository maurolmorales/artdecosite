<?php 
	include './controlador/pagina-controlador.php';
	$MainFunction = new paginaControlador();
	$consultaCat = $MainFunction->mainControlador();
	$title = "Tienda online de Art Deco";
	$main = './vista/modulos/main-404.php';
	$canonical = WEBPAGE;
