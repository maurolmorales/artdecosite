<?php  
	if (!isset($_SESSION['token_ads']) || !isset($_SESSION['usuario_ads'])) {
		session_start(['name'=>'ADS']);
		session_unset();
		session_destroy();
		echo "<script>window.location.href ='".SERVERURL."login' </script>";
	}
	 else{ $main = "modulos/main-admin.php"; }


