<?php

class InicioControlador extends Controlador
{
    private $modelo;

    public function __construct()
    {
        // print "hola desde el controlador login"."<br>";

        $this->modelo = $this->modelo("InicioModelo");

    }
    public function caratula()
    {
        // print "hola desde la caratula "."<br>";

        $datos = [
            "titulo" => "Area Usuarios",

            //"menu" => false
        ];

        $this->vista("LoginVista", $datos);
    }

    public function VerificaLogin()
    {
        
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $usuario = isset($_POST["email"]) ? $_POST["email"] : "";
            $clave = isset($_POST["password"]) ? $_POST["password"] : "";
            $errores = $this->modelo->verificarUsuario($usuario, $clave);

            //comprobamos si esta vacio el array de errores
            if (empty($errores)) {
                //verificamos su estado y rol
                $EstadoyRol = $this->modelo->VericarRolyEstado($usuario, $clave);
                //print( $EstadoyRol);
                var_dump($EstadoyRol);
                $EstadoyRolParseado = $EstadoyRol[0];
                //comprobamos si esta activo el rol
                if ($EstadoyRolParseado["IdRol"] == 1 || $EstadoyRolParseado["IdRol"] == 2 || $EstadoyRolParseado["IdRol"] == 3) {
                    if ($EstadoyRolParseado["IdEstado"] == 1) {

                        $data = $this->modelo->getUsuarioCorreo($usuario);
                        $sesion = new Sesion();
                        $sesion->iniciarLogin($data);
                        header("location:" . RUTA . "AdminControlador");

                    } else {
                        array_push($errores, "Su Usuario No Se Encuentra ACTIVO");
                        $datos = [
                            "titulo" => "Area Usuarios",
                            //"menu" => false,
                            "errores" => $errores,
                            //"data"=>[],
                            //"recordar"=>$recordar,
                            "color" => "error",
                        ];

                        $this->vista("LoginVista", $datos);

                    }

                } else {
                    if ($EstadoyRolParseado["IdEstado"] == 1) {
                        $data = $this->modelo->getUsuarioCorreo($usuario);
                        $sesion = new Sesion();
                        $sesion->iniciarLogin($data);
                        header("location:" . RUTA . "ClienteControlador");

                    } else {
                        array_push($errores, "Su Usuario No Se Encuentra ACTIVO");
                        $datos = [
                            "titulo" => "Area Usuarios",
                            //"menu" => false,
                            "errores" => $errores,
                            //"data"=>[],
                            //"recordar"=>$recordar,
                            "color" => "error",
                        ];

                        $this->vista("LoginVista", $datos);

                    }

                }

                //
            } else {
                $datos = [
                    "titulo" => "Area Usuarios",
                    //"menu" => false,
                    "errores" => $errores,
                    //"data"=>[],
                    //"recordar"=>$recordar,
                    "color" => "error",
                ];

                $this->vista("LoginVista", $datos);

            }
            //
        }
    }
}
