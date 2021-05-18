<?php  
	$porAjax = true;
	require_once "principal-modelo.php";

	class administradorModelo extends Principal {
		
			
		protected function consultarCategoria(){
			$conectar = Principal::conectar()->prepare(SQLCat);
			$conectar->execute();
			$categorias = $conectar->fetchAll(PDO::FETCH_ASSOC);
			foreach ($categorias as $value) {
				$arreglo[] = array("idCategoria"=>$value['idCategoria'],
											"nombreCategoria"=>$value['nombreCategoria'],
											"urlCategoria"=>$value['urlCategoria'],
											"descripcionCategoria"=>$value['descripcionCategoria'],
											"imagenCategoria"=>$value['imagenCategoria'],
											"snippetCategoria"=>$value['snippetCategoria'],
											"idLabel"=>$value['idLabel']
											);
			}
			$lista = json_encode($arreglo);
			echo $lista;
			return $lista;
		}

		protected function consultarProductos(){
			$idCategoria = $_POST['idCategoria'];
			$sql = "SELECT * FROM productos WHERE idCategoria =".$idCategoria;
			$conectar = Principal::conectar()->prepare($sql);
			$conectar->execute();
			$categorias = $conectar->fetchAll(PDO::FETCH_ASSOC);
			foreach ($categorias as $value) {
				$arr[] = array("idCategoria"=>$value['idCategoria'],
											"idProducto"=>$value['idProducto'], 
											"precioProducto"=>$value['precioProducto'], 
											"amazonProducto"=>$value['amazonProducto'], 
											"descripcionProducto"=>$value['descripcionProducto'],
											"imagenProducto"=>$value['imagenProducto'],
											"idLabel"=>$value['idLabel'],
											"stockProducto"=>$value['stockProducto']
											);
			}
			if (empty($arr[0]) ) {}
			else{
				echo $valores = json_encode($arr);
				return $valores;
			}
		}

		protected function consultarLabel (){
			$conectar = Principal::conectar()->prepare(SQLabel);
			$conectar->execute();
			$label = $conectar->fetchAll(PDO::FETCH_ASSOC);
			foreach ($label as $value) {
				$arregloLabel[] = array("idLabel"=>$value['idLabel'],
													"grupoLabel"=>$value['grupoLabel'],
													"nombreLabel"=>$value['nombreLabel'],
													"descripcionLabel"=>$value['descripcionLabel'],
													"imgLabel"=>$value['imgLabel'],
													"snippetLabel"=>$value['snippetLabel']
													);
			}
			$listaLabel = json_encode($arregloLabel);
			echo $listaLabel;
			return $listaLabel;
		}

		protected function agregarCategoria (){
			try {
				$sql = "INSERT INTO categorias(idCategoria, nombreCategoria, urlCategoria, descripcionCategoria, imagenCategoria, idLabel, snippetCategoria) 
					VALUES (:idCategoria, :nombreCategoria, :urlCategoria, :descripcionCategoria, :imagenCategoria, :idLabel, :snippetCategoria)";
				$strm = Principal::conectar()->prepare($sql);
				$strm->bindParam(":idCategoria", $idCategoria);
				$strm->bindParam(":nombreCategoria", $nombreCategoria);
				$strm->bindParam(":urlCategoria", $urlCategoria);
				$strm->bindParam(":descripcionCategoria", $descripcionCategoria);
				$strm->bindParam(":imagenCategoria", $imagenCategoria);
				$strm->bindParam(":idLabel", $idLabel);	
				$strm->bindParam(":snippetCategoria", $snippetCategoria);	
				
				$idCategoria='';
				$nombreCategoria = $_POST['nombre'];
				$urlCategoria = $_POST['url'];
				$descripcionCategoria = $_POST['descripcion'];
				$idLabel = $_POST['label'];
				$snippetCategoria = $_POST['snippetCategoria'];
				if($_FILES !== null || $_FILES !== "undefined"){
					$imagenCategoria = strval($_FILES['imagen']['name']);
					move_uploaded_file($imagenCategoria['imagen']['tmp_name'],
					"../img/categorias/".$imagenCategoria['imagen']['name']);
				}else{ $imagenCategoria = "";	}
				$strm->execute();	
				
			} catch (PDOException $d) { echo "El problema es: ".$d->getMessage();}
		}

		protected function agregarProducto (){
			$idProducto='';
			$imagenProducto = $_POST['imagen'];
			$descripcionProducto = $_POST['descripcion'];
			$precioProducto = $_POST['precio'];
			$amazonProducto = $_POST['link'];
			$idLabel = $_POST['label'];
			$idCategoria = $_POST['idCategoria'];
			$stockProducto = 0;

			$sql = "INSERT INTO productos(idProducto, imagenProducto, descripcionProducto, precioProducto, amazonProducto, idLabel, idCategoria, stockProducto) VALUES (:idProducto, :imagenProducto, :descripcionProducto, :precioProducto, :amazonProducto, :idLabel, :idCategoria, :stockProducto)";

			$conn = Principal::conectar()->prepare($sql);
			$conn->bindParam(":idProducto", $idProducto);
			$conn->bindParam(":imagenProducto", $imagenProducto);
			$conn->bindParam(":descripcionProducto", $descripcionProducto);
			$conn->bindParam(":precioProducto", $precioProducto);
			$conn->bindParam(":amazonProducto", $amazonProducto);
			$conn->bindParam(":idLabel", $idLabel);
			$conn->bindParam(":idCategoria", $idCategoria);
			$conn->bindParam(":stockProducto", $stockProducto);
			$conn->execute();
		}

		protected function agregarLabel(){
			try {
				$sql = "INSERT INTO label(idLabel, grupoLabel, nombreLabel, descripcionLabel, snippetLabel, imgLabel ) 
					VALUES (:idLabel, :grupoLabel, :nombreLabel, :descripcionLabel, :snippetLabel, :imgLabel)";
				$strm = Principal::conectar()->prepare($sql);
				$strm->bindParam(':idLabel', $idLabel);
				$strm->bindParam(':grupoLabel', $grupoLabel);
				$strm->bindParam(':nombreLabel', $nombreLabel);
				$strm->bindParam(':descripcionLabel', $descripcionLabel);
				$strm->bindParam(':snippetLabel', $snippetLabel);	
				$strm->bindParam(':imgLabel', $imagenLabel);
				
				$idLabel=null;
				$grupoLabel= 2;
				$nombreLabel = $_POST['nombre'];
				$descripcionLabel = $_POST['descripcion'];
				$snippetLabel = $_POST['snippet'];
				if($_FILES !== null || $_FILES !== "undefined"){
					$imagenLabel = strval($_FILES['imagen']['name']);
					move_uploaded_file($_FILES['imagen']['tmp_name'],
							"../img/etiquetas/".$_FILES['imagen']['name']);
				}else{ $imagenLabel = "";	}
				$strm->execute();	

			} catch (PDOException $d) {	echo "El problema es: ".$d->getMessage(); }
		}

		protected function modificarCategoria (){
			$idCategoria = $_POST['idCategoria'];
			$nombreCategoria = $_POST['nombre'];
			$urlCategoria = $_POST['url'];
			$descripcionCategoria = $_POST['descripcion'];
			$snippetCategoria = $_POST['snippet'];
			$idLabel = $_POST['label'];
			if (isset($_FILES['imagen'])) {
				$sql = "UPDATE categorias SET nombreCategoria='$nombreCategoria',
																			urlCategoria='$urlCategoria',
																			descripcionCategoria='$descripcionCategoria',
																			snippetCategoria='$snippetCategoria',
																			imagenCategoria='".$_FILES['imagen']['name']."',
																			idLabel='$idLabel'
																			WHERE idCategoria=".$idCategoria;
					$conn = Principal::conectar()->prepare($sql);
					$conn->execute();	
					move_uploaded_file($_FILES['imagen']['tmp_name'],
					"../img/categorias/".$_FILES['imagen']['name']);
			}else{
				$sql = "UPDATE categorias SET nombreCategoria='$nombreCategoria',	urlCategoria='$urlCategoria', descripcionCategoria='$descripcionCategoria', snippetCategoria='$snippetCategoria', idLabel='$idLabel' WHERE idCategoria=".$idCategoria;
			}
				$conn = Principal::conectar()->prepare($sql);
				$conn->execute();	
		}

		protected function modificarProducto (){
			$imagenProducto = $_POST['imagen'];	
			$idCategoria = $_POST['idCategoria'];
			$descripcionProducto = $_POST['descripcion'];
			$precioProducto = $_POST['precio'];
			$amazonProducto = $_POST['link'];
			$idLabel = $_POST['label'];
			$idProducto = $_POST['idProducto'];
			$stockProducto = $_POST['stockProducto'];

			$sql = "UPDATE productos SET precioProducto = '$precioProducto', amazonProducto = '$amazonProducto', imagenProducto = '$imagenProducto', descripcionProducto = '$descripcionProducto', stockProducto = '$stockProducto', idCategoria = '$idCategoria', idLabel = '$idLabel' WHERE idProducto=".$idProducto;
				$conn = Principal::conectar()->prepare($sql);
				$conn->execute();	
				echo $sql;
		}

		protected function modificarLabel (){
			try {
				$sql = "UPDATE label SET grupoLabel= :grupoLabel,
																 nombreLabel= :nombreLabel,
																 descripcionLabel= :descripcionLabel,
																 snippetLabel= :snippetLabel,
																 imgLabel= :imgLabel
																 WHERE idLabel= :idLabel";
				$idLabel = $_POST['idLabel'];
				$grupoLabel = $_POST['grupo'];
				$nombreLabel = $_POST['nombre'];
				$descripcionLabel = $_POST['descripcion'];
				$snippetLabel = $_POST['snippet'];
				$imgLabelMuestra = $_POST['imgLabelMuestra'];
				$imagenLabel;
				if (isset($_FILES['imagen'])) {
					$imagenLabel = strval($_FILES['imagen']['name']);
					move_uploaded_file($_FILES['imagen']['tmp_name'],
					"../img/etiquetas/".$_FILES['imagen']['name']);
				}else{ $imagenLabel = $imgLabelMuestra; }
				$strm = Principal::conectar()->prepare($sql);
				$strm->bindParam(':grupoLabel', $grupoLabel);
				$strm->bindParam(':nombreLabel', $nombreLabel);
				$strm->bindParam(':descripcionLabel', $descripcionLabel);
				$strm->bindParam(':snippetLabel', $snippetLabel);	
				$strm->bindParam(':imgLabel', $imagenLabel);
				$strm->bindParam(':idLabel', $idLabel, PDO::PARAM_INT);
				$strm->execute();	
				echo $_FILES['imagen']['name'];
			}  catch (Exception $d) {	echo "El problema es: ".$d->getMessage(); }
		}
		
		protected function eliminarCategoria (){ 
			$sql = "DELETE FROM categorias WHERE idCategoria=".$_POST['idCategoria'];
			$conn = Principal::conectar()->prepare($sql);
			$conn->execute();
		}

		protected function eliminarProducto (){
			$sql = "DELETE FROM productos WHERE idProducto=".$_POST['idProducto'];
			$conn = Principal::conectar()->prepare($sql);
			$conn->execute();
		}

		protected function eliminarLabel (){
			$sql = "DELETE FROM label WHERE idLabel=".$_POST['idLabel'];
			$conn = Principal::conectar()->prepare($sql);
			$conn->execute();
		}

		protected function selectLabel ($grupo){ 
			$cat = SQLabel." WHERE grupoLabel =".$grupo; 
			$conectar = Principal::conectar()->prepare($cat);
			$conectar->execute();
			$categorias = $conectar->fetchAll(PDO::FETCH_ASSOC);
			foreach ($categorias as $value) {	
				$arr[] = array("idLabel"=>$value['idLabel'], "nombreLabel"=>$value['nombreLabel']);
			}
			echo json_encode($arr);
		}
		
		protected function traerCategoriaAlPanel ($idCat){
			$cat = SQLCat." WHERE idCategoria =".$idCat;
			$conectar = Principal::conectar()->prepare($cat);
			$conectar->execute();
			$categorias = $conectar->fetchAll(PDO::FETCH_ASSOC);
			foreach ($categorias as $value) {
				$arr[] = array("idCategoria"=>$value['idCategoria'],
											"nombreCategoria"=>$value['nombreCategoria'],
											"urlCategoria"=>$value['urlCategoria'],
											"descripcionCategoria"=>$value['descripcionCategoria'],
											"imagenCategoria"=>$value['imagenCategoria'],
											"idLabel"=>$value['idLabel'],
											"snippetCategoria"=>$value['snippetCategoria']	);
			}
			echo json_encode($arr);
		}
		
		protected function traerLabelAlPanel ($idLabel){
			$lab = SQLabel." WHERE idLabel =".$idLabel;
			$conectar = Principal::conectar()->prepare($lab);
			$conectar->execute();
			$Labels = $conectar->fetchAll(PDO::FETCH_ASSOC);
			foreach ($Labels as $value) {
				$arr[] = array("idLabel"=>$value['idLabel'],	
											"nombreLabel"=>$value['nombreLabel'],
											"grupoLabel"=>$value['grupoLabel'],
											"descripcionLabel"=>$value['descripcionLabel'],
											"imgLabel"=>$value['imgLabel'],
											"snippetLabel"=>$value['snippetLabel']
											);
			}
			echo json_encode($arr);
		}

		protected function traerProductosAlPanel ($idProd){
			$cat = SQLProd." WHERE idProducto =".$idProd;
			$conectar = Principal::conectar()->prepare($cat);
			$conectar->execute();
			$productos = $conectar->fetchAll(PDO::FETCH_ASSOC);
			foreach ($productos as $value) {
				$arr[] = array("idProducto"=>$value['idProducto'],
											"imagenProducto"=>$value['imagenProducto'],
											"descripcionProducto"=>$value['descripcionProducto'],
											"precioProducto"=>$value['precioProducto'],
											"amazonProducto"=>$value['amazonProducto'],
											"idLabel"=>$value['idLabel'],
											"idCategoria"=>$value['idCategoria'],
											"stockProducto"=>$value['stockProducto'] );
			}
			echo json_encode($arr);
		}

		protected function cerrarSesion (){
			session_start(['name'=>'ADS']);
			session_unset();
			session_destroy();
			echo "<script>window.location.href ='".SERVERURL."login' </script>";
		}
	}