<style>
	/*-------------------- Administración -----------------------------------*/
	.Admin{	grid-template-columns: 1fr 2fr;	grid-template-rows: 1fr; grid-auto-rows: 1fr;
		grid-gap: 80px; padding: 30px; border: 1px solid orange; }

	.formCategorias {	
		grid-template-columns: repeat(2, 1fr); grid-template-rows: repeat(4, 50px);;
	 	grid-auto-rows: 70px; grid-gap: 20px; padding-top: 60px;}
 /*	.formCategorias *{ border: 1px solid red; }*/
	.formCategorias div input { height: inherit; width: inherit; }

	.formProductos{
		grid-template-columns:repeat(3, 1fr); grid-template-rows: repeat(6, 80px);
		grid-auto-flow: row dense; grid-gap: 20px; }

	#grillaProductos{	padding: 3%; grid-template-columns: repeat(auto-fill, 70px);
		grid-template-rows: 70px; grid-auto-rows: 70px;	align-content: center; 
		justify-content: center; grid-gap: 10px; border-left: 1px solid black; }

	#grillaProductos img{	width: 100%; height: 100%; }
	
	#grillaCategorias{ padding: 3%; grid-template-columns: repeat(auto-fill, 250px);
		grid-template-rows: 40px; grid-auto-rows: 40px; align-content: center;
		justify-content: center; border-left: 1px solid black; }
	#grillaCategorias div, #grillaProductos img{ cursor: pointer;  }
	#btnAddCategoria:hover, #btnAddProducto:hover{ text-shadow: 1px 1px 20px green;
		color: green;  }
	#btnModCategoria:hover, #btnModProducto:hover{
		text-shadow: 1px 1px 20px orange; color: orange;  }

	#btnElimCategoria:hover, #btnElimProducto:hover{ text-shadow: 1px 1px 20px red;
		color: red;  }
	#amazonLink{ color: gold; text-shadow: 2px 2px 3px black ; }
	.prodAgotado{ box-shadow: 2px 2px 6px red; }
	.imgProvisorio:active{ box-shadow: 1px 1px 20px blue; }
	.imgProvisorio:focus{	box-shadow: 1px 1px 20px green; }
	.botonera { grid-template-columns: repeat(3, 1fr);  }
	#btn_cerrarSesion{ width: 200px; height: 80px; }
	input:focus{ background-color: bisque; }
	textarea:focus{ background-color: bisque; }
	input[type=number] { 
  -moz-appearance: textfield;
  appearance: textfield;
  margin: 0; }
</style>
<main class="Admin">
	<article>
		<h2>Categorías</h2>
		<form class="formCategorias" id="formCategorias">
			<div><input type="file" id="imagenCategoria"></div>
			<div><input type="text" id="nombreCategoria" placeholder="Nombre Categoria"></div>
			<div style="grid-column: 2; grid-row: 2/6;"><img src="" alt="" id="imgCategMuestra"></div>
			<div><input type="text" id="urlCategoria" placeholder="url Categoria"></div>
			<div>
				<select name="" id="IdLabelCategoria">
				</select>	
			</div>
			<div style="grid-column: 1; grid-row:4/6;"><textarea id="descripcionCategoria" placeholder="Descripcion" ></textarea>	</div>
			<div class="botonera fullRow">
				<button id="btnAddCategoria">Agregar Categoria</button>
				<button id="btnModCategoria">Modificar Categoria</button>	
				<button id="btnElimCategoria">Eliminar Categoria</button>		
			</div>
		</form>
	</article>

	<article>
		<h2>Grilla Categorias</h2>
		<article id="grillaCategorias"></article>
	</article>

	<article>
		<div><h2>Productos</h2></div>
		
		<form class="formProductos" id="formularioProductos">
			<div class="centrar">
				<label for="stock">Agotado:</label>	
				<input type="checkbox" id="stock" value="1">	
			</div>
			
			<div>
				<label for="imagenProducto">imagen</label>
				<input type="text" id="imagenProducto" max="150" placeholder="url" >
			</div>

			<div>
				<label for="precioProducto">precioProducto</label>
				<input type="number" id="precioProducto" placeholder="$---.--" required>
			</div>

			<div>
				<select name="cantSelect[]" id="labelProducto" multiple></select>	
			</div>

			<div>
				<a href="" target="_blank" id="amazonLink">link Amazon</a>
				<input type="text" id="amazonProducto" placeholder="url" required>  
			</div>

			<div>
				<label for="idProducto">Id Producto</label>
				<input type="number" id="idProducto">
			</div>

			<div>
				<label for="idCatProd">Id Categoria</label>
				<input type="number" id="idCatProd">
			</div>			
			
			<div style="grid-column: 2/4; grid-row: 4/5;">
				<textarea id="descripcionProducto" placeholder="Descripcion" name="description"></textarea>
			</div>

			<div style="grid-column: 2/4; grid-row: 1/4; align-content: center; justify-content: center;">
				<img src="" alt="" id="imgMuestra">
			</div>

			<div class="botonera fullRow">
				<button id="btnAddProducto" >Agregar Producto</button>
				<button id="btnModProducto" >Modificar Producto</button>
				<button id="btnElimProducto">Eliminar Producto</button>	
			</div>

		</form>
	</article>

	<article id="grillaProductos">
	</article>
	<article>
		<div>
			<button type="submit" id="btn_cerrarSesion">Cerrar Sesión</button>	
		</div>
	</article>
</main>
<script src="./vista/js/admin.js" ></script>
<script src="./vista/js/noindex.js" ></script>	