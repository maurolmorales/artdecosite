<?php 
  require 'principal-modelo.php';  

  class loginModelo extends Principal {
    public function iniciar_sesion_modelo($datos){
      $sql = Principal::conectar()->prepare("SELECT * FROM usuarios WHERE nombreUsuario=:usuario AND pswUsuario=:clave");
      $sql->bindParam(":usuario", $datos['usuario']);
      $sql->bindParam(":clave", $datos['clave']);
      $sql->execute();
      return $sql;
    }
  }

