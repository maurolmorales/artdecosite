<section class="Contenedor">
	<main class="Main">
		<section class="separador1">
			<h1>Tienda online de productos en estilo Art Deco</h1>
			<div class="centrar">
				<p class='descripcionCategoria'>
					Posterior al <strong>Art Nouveau</strong>. Nacido a principio del siglo pasado, y cuya dominio se extendió hasta la década de 1950 en algunos países, abarcaría todo el mundo como expresión de modernidad, elegancia y gusto refinado. Nuevamente en la actualidad es tendencia; un movimiento artístico que influyó notablemente en la arquitectura, el diseño de interiores, la pintura, el cine y la moda. Indudablemente la peculiar mezcla entre materiales nobles, diseño geométricos y la combinación de accesorios, que le dan ese toque <em>vintage y moderno</em>, lo ha hecho perdurar en el tiempo dándole ese rasgo de poder y belleza que tanto nos fascina.
 				</p>
 			</div>	
		</section>
		<?php include_once './vista/modulos/banner-amazon.php'; ?>

		<section class="Catalogo" itemscope itemtype="http://schema.org/ImageGallery">
			<?php foreach ($consultaCat as $fila) { $subtitulo = $fila['urlCategoria'];	?>
				
			<a href ="<?php echo $fila['urlCategoria']; ?>" class="Categoria" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">

				<img src="<?php echo "./img/categorias/".$fila['imagenCategoria']; ?>" class="CategImg" alt="<?php echo 'imagen de '.$fila['nombreCategoria']; ?>" itemprop="contentUrl" title="<?php echo $fila['nombreCategoria'].' en art deco'; ?>" loading="lazy" >	
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

		<section class="pad10">
			<p>
				Surge en la <i>exposición internacional de arte decorativo e industrial moderno de 1925</i> en París. El <em>Art Déco</em> <q>def.: artes decorativas</q>, amalgama de estilos y movimientos diversos, se extendió por el mundo convirtiéndose en un fenómeno de masas. Influenciado por la solidez de las formas afín a la monumentalidad de los modelos de la antigua Roma y la Grecia clásica. Con sus imponentes columnas y ricos materiales, el cubismo, la abstracción geométrica, en su mayoría rectas, ángulos y el símbolo del sol. Son representadas como dinamismo de la sociedad industrializada que acompaño los inventos y avances tecnológicos trascendentales en ingeniería y transporte. No obstante, la naturaleza forma una parte importante al estilo simbolizados en flores, palmeras y animales particulares como galgos y panteras. En definitiva se caracteriza por todo lo que resultara diferente y exótico llenando un ambiente de alegría y glamour.	
			</p>			
		</section>
	</main>
	<?php include_once './vista/modulos/menu-blockSuggestion.php'; ?> 
</section>
