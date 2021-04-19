<main class = 'Main'>
	<section class='centrar' >
		<form action='' method='POST' autocomplete='off'>
			<div class='gap10'>
				<input type='text' id='nombreUsuario' name='nombreUsuario' required=''>
				<input type='password' id='claveUsuario' name='claveUsuario' required=''>
				<input type='submit' name='enviar'>
			</div>
		</form>
	</section>
</main>
<?php 
	if (isset($_POST['nombreUsuario']) && isset($_POST['claveUsuario'])) {
		require_once './controlador/login_controlador.php';
		$entradaAdmin = new loginControlador();
		echo $entradaAdmin->iniciar_sesion_controlador();	}
?>
<script async src="./vista/js/noindex.js" ></script>