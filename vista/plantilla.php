<?php
	require_once './controlador/vista-controlador.php';
	$vistaControlador = new VistaControlador();
	$MainURL = $vistaControlador->obtener_vista_ctrl();	
	session_set_cookie_params(['secure'=>true, 'samesite'=>'lax']);
 	session_start(['name'=>'ADS']);

	require_once $MainURL;
	include_once './vista/modulos/head.php';
	include_once './vista/modulos/metas.php'; 
?>

</head>
	<body class="Principal">
	<div id="fb-root" hidden></div>
		<?php 
			include_once './vista/modulos/header.php';
			include_once $main;
			include_once './vista/modulos/cookies.php'; 
			include_once './vista/modulos/footer.php';
		?>
	<script src="./vista/js/footer.js" ></script>
	</body>
</html>