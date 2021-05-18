<section class="Contenedor">
	<main class="Main">
		<section class="separador2" >
			<h1><?php echo $nombreLabel; ?> Art Deco</h1>
			<p class='descripcionCategoria'><?php echo $descripcionLabel; ?></p>
		</section>
		
		<section class="Catalogo" >
			<?php	$ArrayTemporal=[];
            
			foreach ($consultaProd as $fila) {
				$archivo = json_decode($fila['idLabel'], true);
				foreach ($archivo as $value){ 
					if ($value === $idLabelProd) { array_push($ArrayTemporal, array('idProducto' => $fila['idProducto'], 'imagenProducto' => $fila['imagenProducto'], 'descripcionProducto' => $fila['descripcionProducto'], 'precioProducto' => $fila['precioProducto'], 'amazonProducto' => $fila['amazonProducto'], 'idLabel' => $fila['idLabel'], 'idCategoria' => $fila['idCategoria'],'stockProducto' => $fila['stockProducto']));
					}
				}
			}
			$consultaProd=null; $archivo=null;
			function stock($stockProducto) { if ($stockProducto == 1){ return "sinStock"; } };
			foreach ($ArrayTemporal as $valor) { ?>
				<a href="<?php echo $valor['amazonProducto']; ?>" target="_blank" rel="nofollow">
		      <article class="Producto <?php echo stock($valor['stockProducto']); ?>" id="<?php echo $valor['idProducto']; ?>">
		          <img src="<?php echo $valor['imagenProducto']; ?>" alt="imagen de producto" class="ProdImg" loading="lazy">
		         <p class="ProdDescripcion"><?php echo $valor['descripcionProducto'];?></p>
						
		      </article>          
        </a>        
        <?php } ?>
			
		</section>

		<section class="social">
			<div class="fb-like" data-href="<?php echo SERVERURL.$urlCategoria; ?>" data-width="50" data-layout="button" data-action="like" data-size="large" data-share="true" data-colorscheme="dark"></div>
			<a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Hello%20world" data-size="large"> </a>
			<a href="https://www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"
			data-pin-height="28"></a>
		</section>
		
	</main>
	<?php include_once './vista/modulos/menu-blockSuggestion.php'; ?>
</section>

<!-- Desafectado hasta conseguir la API de Amazon. -->
<!-- <script async src="<?php //echo SERVERURL;?>vista/js/productos.js"></script> -->
<script type="application/ld+json">
	{
	  "@context": "https://schema.org",
	  "@type": "Article",
	  "mainEntityOfPage": {
	    "@type": "WebPage",
	    "@id": "<?php echo $metaUrl; ?>"
	  },
	  "headline": "<?php echo $nombreLabel; ?>",
	  "description": "<?php echo $snippetLabel; ?>",
	  "image": "<?php echo SERVERURL.$imgLabel; ?>",  
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
	      "width":542 ,
	      "height":542 
	    }
	  },
	  "datePublished": "2019-04-05",
	  "dateModified": "2020-04-16"
	}
</script>