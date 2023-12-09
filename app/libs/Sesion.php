<?php
/**
 * Manejar sesión
 */
class Sesion{
  private $login = false;
  private $usuario;
  
  function __construct()
  {
    session_start();
    if (isset($_SESSION["Rol"])) {
      $this->usuario = $_SESSION["Rol"];
      $this->login = true;
    } else {
      unset($this->usuario);
      $this->login = false;
    }
  }

  public function iniciarLogin($usuario){
    if ($usuario) {
      $this->usuario = $_SESSION["Rol"] = $usuario;
      $this->login = true;
    }
  }

  public function finalizarLogin(){
    unset($_SESSION["Rol"]);
    unset($this->usuario);
    $this->login = false;
  }

  public function getLogin(){
    return $this->login;
  }

  public function getUsuario(){
    return $this->usuario;
  }
}

?>