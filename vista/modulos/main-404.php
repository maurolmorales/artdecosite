<section class="Contenedor">
	<main class="Main">
		<article class="separador1">
			<h3 style="font-size: 4em; ">404</h3>
			<h5 class="centrar">Lo sentimos, no hemos podido encontrar lo que estaba buscando</h5>
		</article>
		<section class="Catalogo" itemscope itemtype="http://schema.org/ImageGallery">
			<?php foreach ($consultaCat as $fila) { $subtitulo = $fila['urlCategoria'];	?>
					
				<a href ="<?php echo $fila['urlCategoria']; ?>" class="Categoria" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">

					<img src="<?php echo "./img/categorias/".$fila['imagenCategoria']; ?>" class="CategImg" alt="<?php echo 'imagen de '.$fila['nombreCategoria']; ?>" itemprop="contentUrl" title="<?php echo $fila['nombreCategoria'].' en art deco'; ?>" >	
					<h2 class="CategTitulo" itemprop="caption">
						<?php echo $fila['nombreCategoria']; ?>
					</h2>	
					
					<div class="CategDescripcion" >
						<p itemprop="description"> 
							<?php echo substr($fila['descripcionCategoria'],0, 150)."... "; ?>
						</p>	
					</div>
					<div class="placaCorner"></div>
				</a>
		
				<?php } ?>
		</section>
	</main>	
	<?php include_once './vista/modulos/menu-blockSuggestion.php'; ?> 
</section>	
<script async src="./vista/js/noindex.js" ></script>	