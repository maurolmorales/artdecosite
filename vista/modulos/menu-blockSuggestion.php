<div id="blockSuggestion">
	<form action="consulta" method="POST" id="formulario" class="centrar">
		<input type="text" id="buscarLabel" name="palabra" placeholder="buscar palabra">
	</form>

	<div id="tag">
		<?php	$menuFunctionEti = new paginaControlador();
			$SQLeti = " WHERE	grupoLabel = 2"; 
			$consultaEti = $menuFunctionEti->consultaEtiControlador($SQLeti); 
			foreach ($consultaEti as $value) {	?>
				<a href="<?php echo mb_strtolower($value['nombreLabel'],'UTF-8'); ?>">
					<p> <?php echo $value['nombreLabel']; ?></p>
				</a>
		<?php	}	?>
	</div>
	<span>
	<?php if (isset($idLabel)) { ?>
		<span class="fullRow centrarGrid">También te puede interesar: </span>
		<div id="asideCat"> 
		<?php 
			$SQLSugerencias = " WHERE idLabel = ";
			$menuFunctionCat = new paginaControlador();
			$consultaCatMenu = $menuFunctionCat->consultaCatControlador($SQLSugerencias, $idLabel); 
			foreach ($consultaCatMenu as $valor) { 
				if ($valor['nombreCategoria'] !== $nombreCategoria) { ?>
					<a href="<?php echo $valor['urlCategoria']; ?>" >
						<p> <?php echo $valor['nombreCategoria']; ?> </p> 
					</a>	
		<?php } }	return;	?>
		</div>
	<?php } ?>
	</span>
</div>
<script>
	var buscarLabel = document.querySelector('#buscarLabel');
	buscarLabel.addEventListener('keyup', (e)=>{
		e.preventDefault();
		if (e.keyCode === 13){ consultaFormulario() }
	});		
	var consultaFormulario = ()=>{
	var formulario = document.getElementById('formulario');
	formulario.submit();
}
</script>