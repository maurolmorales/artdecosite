<?php 
try {
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
		$snippetLabel = $value['snippetLabel'];
	}	

	$metaDescripcion = substr($snippetLabel, 0, 157);
	$metaType = "article";
	$metaTitle = "$nombreLabel en Art Decó";
	$metaImage = "./img/etiquetas/$imgLabel";
	$metaUrl = mb_strtolower($nombreLabel);
	$canonical = SERVERURL.$metaUrl;
	$subtitulo = $nombreLabel." ­­­|| ";

} catch (Exception $e) {
	echo "mensaje: ", $e->getMessage();
}