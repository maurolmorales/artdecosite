var serverUrl = "https://art-deco.site/";
var formCategorias = document.getElementById('formCategorias');
var grillaCategorias = document.getElementById('grillaCategorias');
var formularioProductos = document.getElementById('formularioProductos');
var grillaProductos = document.getElementById('grillaProductos');

var selectProv; 
var idCategoria = '';
var nombreCategoria = document.getElementById('nombreCategoria');
var urlCategoria = document.getElementById('urlCategoria');
var imagenCategoria = document.getElementById('imagenCategoria');
var imgCategMuestra = document.getElementById('imgCategMuestra');
var labelCategoria = document.getElementById('IdLabelCategoria');
var descripcionCategoria = document.getElementById('descripcionCategoria');	
var addCatbtn = document.getElementById('btnAddCategoria');	
var modCatbtn = document.getElementById('btnModCategoria');
var elimCatbtn = document.getElementById('btnElimCategoria');

var stockProducto = document.getElementById('stock');
var labelProducto = document.getElementById('labelProducto');
var precioProducto = document.getElementById('precioProducto');
var descripcionProducto = document.getElementById('descripcionProducto');
var amazonProducto = document.getElementById('amazonProducto');
var idProducto = document.getElementById('idProducto');
var idCatProd = document.getElementById('idCatProd');
var imagenProducto = document.getElementById('imagenProducto');
var imgMuestra = document.getElementById('imgMuestra');
var addProdbtn = document.getElementById('btnAddProducto');
var modProdbtn = document.getElementById('btnModProducto');
var elimProdbtn = document.getElementById('btnElimProducto');

var botonPrueba = document.getElementById('btn_prueba');
var cerrarSesion = document.getElementById('btn_cerrarSesion');
let boxSelectPR;

var ajaxAdmin = (config)=>{
	var xhr = new XMLHttpRequest();
	xhr.open(config.metodo, config.url, true);
	xhr.addEventListener("load", ()=>{ 
		if(xhr.readyState == 4 && xhr.status == 200){
			config.parametros(xhr.response);
		}
	})
	xhr.send(config.data);
}

var resetForm = ()=>{ 
	imgMuestra.setAttribute('src', '');
	formularioProductos.reset();
	descripcionProducto.innerText = '';
}

var selectionProd = ()=>{
	var arr = []; var g; var va = labelProducto;var i=0; 
	for (g = 0; g < va.length; g++) {
		if (va[g].selected) {arr[i] = parseInt(va[g].value); i++; } 
	}
	var listo = JSON.stringify(arr);
	return listo;
}

var traerCategoriaAlPanel = (valor)=>{ // Plasma en el formulario los datos.
	var lista; var i; 
	var dataForm = new FormData();
	dataForm.append('clave','traerCategoriaAlPanel');
	dataForm.append('idCat', valor); 
	ajaxAdmin({
		metodo:"POST",
		url:"controlador/administrador-controlador.php",
		data:dataForm,
		parametros:(respuesta)=>{ 
			lista = JSON.parse(respuesta);
			for(i in lista){
				idCategoria = lista[i].idCategoria;						
				nombreCategoria.value = lista[i].nombreCategoria;
				urlCategoria.value = lista[i].urlCategoria;
				descripcionCategoria.value = lista[i].descripcionCategoria;		
				labelCategoria.value = lista[i].idLabel;
				imgCategMuestra.setAttribute('src', "img/categorias/"+lista[i].imagenCategoria);
			}
			consProductos(idCategoria);
			idCatProd.value = idCategoria;
		}
	});
	return
}

var traerProductosAlPanel = (valor)=>{ // Plasma en el formulario los datos.
	resetForm();
	var lista; var i; var imgMuestraAlt;
	var amazonLink = document.getElementById('amazonLink');
	var dataForm = new FormData();
	dataForm.append('clave','traerProductosAlPanel');
	dataForm.append('idProducto', valor);
	ajaxAdmin({
		metodo:"POST",
		url:"controlador/administrador-controlador.php",
		data:dataForm,
		parametros:(respuesta)=>{ lista = JSON.parse(respuesta);
			for(i in lista){
				imagenProducto.value = lista[i].imagenProducto;
				descripcionProducto.innerText = lista[i].descripcionProducto;
				precioProducto.value = lista[i].precioProducto;
				amazonProducto.value = lista[i].amazonProducto;
				idCatProd.value = lista[i].idCategoria;
				amazonLink.setAttribute('href', lista[i].amazonProducto);
				imgMuestra.setAttribute('src', lista[i].imagenProducto)
				idProducto.value = lista[i].idProducto;
				if (boxSelectPR == "undefined" || boxSelectPR == null) { 
					boxSelectPR = document.getElementById('img-'+lista[i].idProducto)
					boxSelectPR.style.boxShadow = "1px 1px 10px 5px darkmagenta";
				}	else{ 
					boxSelectPR.style.boxShadow = '';
					boxSelectPR = document.getElementById('img-'+lista[i].idProducto)
					boxSelectPR.style.boxShadow = "1px 1px 10px 5px darkmagenta"; } 
				
				if(lista[i].stockProducto > 0){ stockProducto.checked = true; 
					imgMuestra.style.boxShadow = "10px 10px 30px red";  }
					else{ stockProducto.checked = false; 
						imgMuestra.style.boxShadow = ""; }

				var pre = JSON.parse(lista[i].idLabel)
				for (var i = 0; i < labelProducto.length; i++) {
					for (var obj in pre) {
					 	if (labelProducto[i].value == pre[obj]) {
							labelProducto[i].selected = true; 
						}	
					}
				}
			}
		}
	});
	return;
}

var consProductos = (idCategoria)=>{ // onclick de la unidad a seleccionar.
	resetForm();
	var sel = document.querySelectorAll('.imgProvisorio');
	Array.prototype.forEach.call( sel, function( node ) {
		node.parentNode.removeChild( node );
	}); /* elimina todos los span creados anteriormente */
	var h; var pedido = new FormData();
	pedido.append("clave","consultarProductos")
	pedido.append("idCategoria", idCategoria)
	ajaxAdmin({
		metodo:"POST",
		url:"controlador/administrador-controlador.php",
		data:pedido,
		parametros:(respuesta)=>{ 
			if (respuesta !== '') {
				var res = JSON.parse(respuesta);
				for(h = 0; h < res.length; h++){
					var img = document.createElement('img');
					img.setAttribute('src', res[h].imagenProducto);
					img.setAttribute('class','imgProvisorio');
					if (res[h].stockProducto > 0){ img.setAttribute('class','prodAgotado imgProvisorio'); }
					else { img.setAttribute('class','imgProvisorio'); }
					img.setAttribute('id','img-'+res[h].idProducto);
					img.setAttribute('onclick', "traerProductosAlPanel("+res[h].idProducto+")");
					grillaProductos.appendChild(img); 	
				}
			}
		}
	}); //trae una grilla de imágenes.
	return;
}

var selection = (selector, grupo)=>{
	var lista; var i;	var dataFormLabel = new FormData();
	dataFormLabel.append('grupoLabel', grupo);
	dataFormLabel.append('clave', 'selectLabel');
	ajaxAdmin({
		metodo:"POST",
		url:"controlador/administrador-controlador.php",
		data:dataFormLabel,
		parametros:(respuesta)=>{ 
			lista = JSON.parse(respuesta);
			for(i in lista){
				var pas = document.createElement("option");
				pas.value = lista[i].idLabel;
				pas.innerText = lista[i].nombreLabel;
				selector.appendChild(pas);
			}
		}
	});
}

var consCategoria = ()=>{ 
	var h;
	var pedido = new FormData();
	pedido.append("clave","consultarCategoria");
	//pedido.append("clave","prueba")
	ajaxAdmin({
		metodo:"POST",
		url:"controlador/administrador-controlador.php",
		data:pedido,
		parametros:(respuesta)=>{
			//console.log(respuesta)
			var res = JSON.parse(respuesta);
			//console.log(res)
			for(h = 0; h < res.length; h++){
				var div = document.createElement("div");
				div.innerHTML = res[h].idCategoria+" - "+res[h].nombreCategoria;
				div.setAttribute('onclick', "traerCategoriaAlPanel("+res[h].idCategoria+")");
				grillaCategorias.appendChild(div);
			}
		}
	});
	return;
}

addCatbtn.addEventListener("click", (e)=>{
	e.preventDefault();
	var conf = confirm("seguro de Agregar la Categoría?");
		if( conf == true){
		var dataForm = new FormData();
		dataForm.append('clave','agregarCategoria');
		dataForm.append('nombre', nombreCategoria.value);
		dataForm.append("url", urlCategoria.value);
	  dataForm.append("imagen", imagenCategoria.files[0]);
		dataForm.append("label", labelCategoria.value);
		dataForm.append("descripcion", descripcionCategoria.value);
		ajaxAdmin({
			metodo:"POST",
			url:"controlador/administrador-controlador.php",
			data:dataForm,
			parametros:(respuesta)=>{ console.log(respuesta.resposeText)}
		});
		formCategorias.reset();
	}
});

modCatbtn.addEventListener("click", (e)=>{
	e.preventDefault();
	var conf = confirm("seguro de Modificar la categoría?");
	if( conf == true){
		var dataForm3 = new FormData();
		dataForm3.append("clave","modificarCategoria");
		dataForm3.append("idCategoria", idCategoria);
		dataForm3.append("nombre", nombreCategoria.value);
		dataForm3.append("url", urlCategoria.value);
		dataForm3.append("imagen", imagenCategoria.files[0]);
		dataForm3.append("label", labelCategoria.value);
		dataForm3.append("descripcion", descripcionCategoria.value);
		ajaxAdmin({
			metodo:"POST",
			url:"controlador/administrador-controlador.php",
			data:dataForm3,
			parametros:(respuesta)=>{ console.log(respuesta.resposeText)}
		});
		formCategorias.reset(); imgCategMuestra.setAttribute('src', '');	
	}
});

elimCatbtn.addEventListener("click", (e)=>{
	e.preventDefault();
	var conf = confirm("seguro de ELIMINAR la categoría?");
	if( conf == true){
		var dataForm = new FormData();
		dataForm.append('clave','eliminarCategoria');
		dataForm.append('idCategoria', idCategoria);
		ajaxAdmin({
			metodo:"POST",
			url:"controlador/administrador-controlador.php",
			data:dataForm,
			parametros:(respuesta)=>{ console.log(respuesta.resposeText)}
		});
		formCategorias.reset();
	}
});

addProdbtn.addEventListener("click", (e)=>{
	e.preventDefault();
	var conf = confirm("seguro de AGREGAR el producto?");
	if( conf === true){
		var dataForm = new FormData();
		dataForm.append('clave','agregarProducto');
		dataForm.append('precio', precioProducto.value);
		dataForm.append("link", amazonProducto.value);
		dataForm.append("imagen", imagenProducto.value) 
		dataForm.append("label", selectionProd());
		dataForm.append("descripcion", descripcionProducto.value);
		dataForm.append("idCategoria", idCategoria);
		dataForm.append("idProducto", idProducto.value);
		if(stockProducto.checked ){ stockProducto.value = 1 }
						else{ stockProducto.value = 0 }
		dataForm.append("stockProducto", stockProducto.value);
		ajaxAdmin({
			metodo:"POST",
			url:"controlador/administrador-controlador.php",
			data:dataForm,
			parametros:(respuesta)=>{ console.log(respuesta.resposeText)}
		});
		formularioProductos.reset();
	}	
});

modProdbtn.addEventListener("click", (e)=>{
	e.preventDefault();
	var conf = confirm("seguro de MODIFICAR el producto?");
	if( conf == true){
		var dataForm = new FormData();
		dataForm.append('clave','modificarProducto');
		dataForm.append('precio', precioProducto.value);
		dataForm.append("link", amazonProducto.value);
		dataForm.append("imagen", imagenProducto.value)
		dataForm.append("label", selectionProd());
		dataForm.append("descripcion", descripcionProducto.value);
		dataForm.append("idCategoria", idCatProd.value);
		dataForm.append("idProducto", idProducto.value);
		if(stockProducto.checked ){ stockProducto.value = 1 }
						else{ stockProducto.value = 0 }
		dataForm.append("stockProducto", stockProducto.value); 	

		ajaxAdmin({
			metodo:"POST",
			url:"controlador/administrador-controlador.php",
			data:dataForm,
			parametros:(respuesta)=>{ console.log(respuesta.resposeText)}
		});
		imgMuestra.setAttribute('src', '');
		formularioProductos.reset();
	}	
});

elimProdbtn.addEventListener("click", (e)=>{
	e.preventDefault();
	var conf = confirm("seguro de ELIMINAR el producto?");
	if( conf == true){
		confirm("seguro de ELIMINAR el Producto?");
		var dataForm = new FormData();
		dataForm.append('clave','eliminarProducto');
		dataForm.append('idProducto', idProducto.value);
		ajaxAdmin({
			metodo:"POST",
			url:"controlador/administrador-controlador.php",
			data:dataForm,
			parametros:(respuesta)=>{ console.log(respuesta.resposeText)}
		});
		formularioProductos.reset();
	}	
});

cerrarSesion.addEventListener("click", (e)=>{
	e.preventDefault();
	confirm("seguro de Cerrar la Sesión?");
	var dataForm = new FormData();
	dataForm.append('clave','cerrarSesion');
	ajaxAdmin({
		metodo:"POST",
		url:"controlador/administrador-controlador.php",
		data:dataForm,
		parametros:(respuesta)=>{ window.location.href = serverUrl }
	});
});

amazonProducto.addEventListener("focus", (e)=>{ e.target.select(); })
imagenProducto.addEventListener("focus", (e)=>{ e.target.select(); })

document.addEventListener("DOMContentLoaded", consCategoria);
document.addEventListener("DOMContentLoaded", selection(labelProducto, 2));
document.addEventListener("DOMContentLoaded", selection(labelCategoria,1));


