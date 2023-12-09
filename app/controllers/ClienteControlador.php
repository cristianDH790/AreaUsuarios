<?php

class ClienteControlador extends Controlador
{
    private $modelo;

    public function __construct()
    {
        // print "hola desde el controlador login"."<br>";

        $this->modelo = $this->modelo("ClienteModelo");

    }
    public function caratula()
    {
        // print "hola desde la caratula "."<br>";

        $sesion = new Sesion();
        $valorRol = $sesion->getUsuario()['IdRol'];
        if ($sesion->getLogin() && $valorRol[0] == 4) {
            $datos=[
              "titulo" => "Area Cliente"

             //"menu" => false
             ];

             $this->vista("HomeClienteVista",$datos);
        } else {
            header("location:".RUTA."InicioControlador");

        }

    }

    function salir(){
        $sesion=new Sesion();
        $sesion->finalizarLogin();
        /*$datos = [
            "titulo" => "Administrativo ",
            "menu" => false,
            "admon" => false,
           "color" => "alert-danger",
            
          ];
          $this->vista("admonVista",$datos);*/
        header("location:".RUTA."InicioControlador");
        }
}