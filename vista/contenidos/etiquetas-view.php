<?php 
	include './controlador/pagina-controlador.php';
	$grupoFunction = new paginaControlador();
	$conditionLab = " WHERE idLabel="; 
	$SQLLabelPro = $conditionLab.$idLabelProd;
	$consultaProd = $grupoFunction->consultaProdControlador(null);
	$consultaLabel = $grupoFunction->consultaEtiControlador($SQLLabelPro);

	$main = './vista/modulos/main-etiquetas.php';

	foreach ($consultaLabel as $value) {
		$nombreLabel = $value['nombreLabel'];
		$descripcionLabel = $value['descripcionLabel'];
		$imgLabel = $value['imgLabel'];
	}	

	$metaDescripcion = substr($descripcionLabel, 0, 157);
	$metaType = "article";
	$metaTitle = "$nombreLabel en Art Decó";
	$metaImage = "./img/etiquetas/$imgLabel";
	$metaUrl = mb_strtolower($nombreLabel);
	$canonical = SERVERURL.$metaUrl;
	$subtitulo = $nombreLabel." ­­­⪢ ";