<?php  
	$porAjax = true;
	require_once "principal-modelo.php";

	class administradorModelo extends Principal {
		
		protected function agregarCategoria (){
			$idCategoria='';
			$nombreCategoria = $_POST['nombre'];
			$urlCategoria = $_POST['url'];
			$idLabel = $_POST['label'];
			$descripcionCategoria = $_POST['descripcion'];
			$imagenCategoria = $_FILES;
			$sql = "INSERT INTO categorias(idCategoria, nombreCategoria, urlCategoria, descripcionCategoria, imagenCategoria, idLabel) VALUES (:idCategoria, :nombreCategoria, :urlCategoria, :descripcionCategoria, :imagenCategoria, :idLabel)";
			$conn = Principal::conectar()->prepare($sql);
			$conn->bindParam(":idCategoria", $idCategoria);
			$conn->bindParam(":nombreCategoria", $nombreCategoria);
			$conn->bindParam(":urlCategoria", $urlCategoria);
			$conn->bindParam(":descripcionCategoria", $descripcionCategoria);
			$conn->bindParam(":imagenCategoria", $imagenCategoria['imagen']['name']);
			$conn->bindParam(":idLabel", $idLabel);	
			$conn->execute();	
			move_uploaded_file($imagenCategoria['imagen']['tmp_name'],
					"../img/categorias/".$imagenCategoria['imagen']['name']);
		}

		protected function modificarCategoria (){
			$idCategoria = $_POST['idCategoria'];
			$nombreCategoria = $_POST['nombre'];
			$urlCategoria = $_POST['url'];
			$descripcionCategoria = $_POST['descripcion'];
			$idLabel = $_POST['label'];
			if (($_FILES['imagen']['name']!==null) && ($_FILES['imagen']['name']!=='undefined')) {
				$sql = "UPDATE categorias SET nombreCategoria='$nombreCategoria',	urlCategoria='$urlCategoria', descripcionCategoria='$descripcionCategoria', imagenCategoria='".$_FILES['imagen']['name']."', idLabel='$idLabel' WHERE idCategoria=".$idCategoria;
					$conn = Principal::conectar()->prepare($sql);
					$conn->execute();	
					move_uploaded_file($_FILES['imagen']['tmp_name'],
					"../img/categorias/".$_FILES['imagen']['name']);
					echo "con imagen";
					echo $sql;
			}else{
				$sql = "UPDATE categorias SET nombreCategoria='$nombreCategoria',	urlCategoria='$urlCategoria', descripcionCategoria='$descripcionCategoria', idLabel='$idLabel' WHERE idCategoria=".$idCategoria;
			}
				$conn = Principal::conectar()->prepare($sql);
				$conn->execute();	
				echo "sin imagen";
				echo $sql;
		}
			
		protected function eliminarCategoria (){ 
			$sql = "DELETE FROM categorias WHERE idCategoria=".$_POST['idCategoria'];
			$conn = Principal::conectar()->prepare($sql);
			$conn->execute();
		}

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
											"idLabel"=>$value['idLabel']
											);
			}
			$lista = json_encode($arreglo);
			echo $lista;
			return $lista;
			
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
		
		protected function eliminarProducto (){
			$sql = "DELETE FROM productos WHERE idProducto=".$_POST['idProducto'];
			$conn = Principal::conectar()->prepare($sql);
			$conn->execute();
		}

		protected function selectLabel ($variable){ 
			$cat = SQLabel." WHERE grupoLabel =".$variable; 
			$conectar = Principal::conectar()->prepare($cat);
			$conectar->execute();
			$categorias = $conectar->fetchAll(PDO::FETCH_ASSOC);
			foreach ($categorias as $value) {	
				$arr[] = array("idLabel"=>$value['idLabel'], "nombreLabel"=>$value['nombreLabel']);
			}
			echo json_encode($arr);
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
											"idLabel"=>$value['idLabel']	);
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

