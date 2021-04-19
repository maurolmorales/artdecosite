<?php 
	include './controlador/pagina-controlador.php';
	$consultaFunction = new paginaControlador();
	$palabra = $consultaFunction->clearChain($_POST['palabra']); 
	$consultaPagina = $consultaFunction->cosultaPagControlador($palabra);
	$param = "";
	$consultCategorias = $consultaFunction->consultaCatControlador($param, $param);

	$main = './vista/modulos/main-consulta.php';	
	$canonical = WEBPAGE;	 