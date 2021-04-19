<section class="Contenedor">
	<main class="Main">
		<section class="separador2" >
			<h1><?php echo $nombreCategoria; ?> Art Deco</h1>
			<p><?php echo $descripcionCategoria; ?></p>
		</section>
		
		<section class="Catalogo">
			<?php foreach ($consultaProd as $fila) { ?>
			<a href="<?php echo $fila['amazonProducto'];?>" target="_blank" rel="nofollow">
				<article class="Producto <?php if($fila['stockProducto'] == 1){ echo 'sinStock'; } ?>" id="<?php echo $fila['idProducto'];?>">
					<img src="<?php echo $fila['imagenProducto'];?>" alt="imagen de producto" class="ProdImg" loading="lazy">	
					<p class="ProdDescripcion"><?php echo $fila['descripcionProducto'];?></p>
					<!-- Desafectado hasta conseguir la API de Amazon. -->
					<!-- <div class="ProdPrecio">
						<p><?php //echo $fila['precioProducto'];?></p>
						<span>&#8364</span>
					</div> --> 
				</article>
			</a>
			<?php } ?>
		</section>

		<section class="social">
			<div class="fb-like" data-href="<?php echo SERVERURL.$urlCategoria;?>" data-width="50" data-layout="button" data-action="like" data-size="large" data-share="true" data-colorscheme="dark"></div>
			<a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Hello%20world" data-size="large"></a>
			<a href="https://www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"	data-pin-height="28"></a>
		</section>
	</main>
	<?php include_once './vista/modulos/menu-blockSuggestion.php'; ?> 
</section>

<!-- Desafectado hasta conseguir la API de Amazon. -->
<!-- <script async src="./vista/js/productos.js"></script> --> 
<script type="application/ld+json">
	{
	  "@context": "https://schema.org",
	  "@type": "Article",
	  "mainEntityOfPage": {
	    "@type": "WebPage",
	    "@id": "<?php echo $metaUrl; ?>"
	  },
	  "headline": "<?php echo $nombreCategoria; ?>",
	  "description": "<?php echo $descripcionCategoria; ?>",
	  "image": "<?php echo  SERVERURL.$imagenCategoria; ?>",  
	  "author": {
	    "@type": "Organization",
	    "name": "<?php echo COMPANY; ?>"
	  },  
	  "publisher": {
	    "@type": "Organization",
	    "name": "<?php echo COMPANY; ?>",
	    "logo": {
	      "@type": "ImageObject",
	      "url": "<?php echo SERVERURL;?>img/logo.jpg",
	      "width":542,
	      "height":542 
	    }
	  },
	  "datePublished": "2019-04-05",
	  "dateModified": "2020-04-16"
	}
</script>
