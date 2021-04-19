<section class="Contenedor">
	<main class="Consulta">
	
	<?php 
		if ($palabra == "" || count($consultaPagina)==0 || $palabra == null) {  ?>		
		<section id="separador1">
			<h2>Lo sentimos, no hemos podido encontrar lo que nos has solicitado</h2>
		</section>
		<section class="Catalogo" itemscope itemtype="http://schema.org/ImageGallery">
			<?php foreach ($consultCategorias as $fila) { $subtitulo = $fila['urlCategoria'];	?>

			<a href ="<?php echo $fila['urlCategoria']; ?>" class="Categoria" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
				
				<div class="placaCorner" ></div>

				<img src="<?php echo "img/categorias/".$fila['imagenCategoria']; ?>" class="CategImg" alt="<?php echo 'imagen de '.$fila['nombreCategoria']; ?>" itemprop="contentUrl" >	
				<h2 class="CategTitulo" itemprop="caption" loading="lazy">
					<?php echo $fila['nombreCategoria']; ?>
				</h2>	
				<div class="CategDescripcion" >
					<p itemprop="description"> 
						<?php echo substr($fila['descripcionCategoria'],0, 150)."... "; ?>
					</p>	
				</div>
			</a>
	
			<?php } ?>
		</section>

	<?php	} else{	?>		
		<section id="separador1">
			<h2>Resultado para: "<?php echo $palabra; ?>"</h2>
		</section>
		<section class="Catalogo">
			<?php foreach ($consultaPagina as $fila) { if ($fila['stockProducto']==1) { } else{ ?>
			<a href="<?php echo $fila['amazonProducto']; ?>" target="_blank" rel="nofollow"> 
				<article class="Producto <?php if ($fila['stockProducto'] == 1){ echo 'sinStock'; } ?>" id="<?php echo $fila['idProducto']; ?>">
					<img src="<?php echo $fila['imagenProducto']; ?>" alt="imagen de producto" class="ProdImg">
					<p class="ProdDescripcion"><?php echo $fila['descripcionProducto'];?></p>
						<!-- Desafectado hasta conseguir la API de Amazon. -->
					<!-- <div class="ProdPrecio">
						<p> <?php //echo $fila['precioProducto']; ?></p>
						<span> &#8364</span>
					</div> -->
				</article>
			</a>
			<?php } } ?>
		</section>
	
	<?php	} ?>		

	</main>
	<?php include_once './vista/modulos/menu-blockSuggestion.php'; ?> 
</section>

<script async src="<?php echo SERVERURL;?>vista/js/productos.js"></script>