<?php

class AdminControlador extends Controlador
{
    private $modelo;

    public function __construct()
    {
        // print "hola desde el controlador login"."<br>";

        $this->modelo = $this->modelo("AdminModelo");

    }
    public function caratula()
    {
        $sesion = new Sesion();
        $valorRol = $sesion->getUsuario()['IdRol'];
        if ($sesion->getLogin() && $valorRol[0] != 4) {

            // print "hola desde la caratula "."<br>";
            $res = $sesion->getUsuario();

            $datos = [
                "titulo" => "Administrador",
                "data" => $res,

                //"menu" => false
            ];

            $this->vista("HomeAdminVista", $datos);
        } else {
            header("location:" . RUTA . "InicioControlador");
        }
    }
    public function salir()
    {
        $sesion = new Sesion();
        $sesion->finalizarLogin();
        /*$datos = [
        "titulo" => "Administrativo ",
        "menu" => false,
        "admon" => false,
        "color" => "alert-danger",

        ];
        $this->vista("admonVista",$datos);*/
        header("location:" . RUTA . "InicioControlador");
    }
    public function UsuariosAdmin()
    {
        $sesion = new Sesion();
        $valorRol = $sesion->getUsuario()['IdRol'];
        if ($sesion->getLogin() && $valorRol[0] != 4) {
            // print "hola desde la caratula "."<br>";
            $res = $sesion->getUsuario();
            $data = $this->modelo->getUsuariosAdmin();
            $datos = [
                "titulo" => "Usuarios Admin",
                "data" => $res,
                "dataTable" => $data,
                //"menu" => false
            ];

            $this->vista("UsuariosAdmin", $datos);

        } else {
            header("location:" . RUTA . "InicioControlador");
        }

    }
    public function BancosAdmin()
    {
        $sesion = new Sesion();
        $valorRol = $sesion->getUsuario()['IdRol'];
        if ($sesion->getLogin() && $valorRol[0] != 4) {
            // print "hola desde la caratula "."<br>";
            $res = $sesion->getUsuario();
            $data = $this->modelo->getBancosAdmin();
            $datos = [
                "titulo" => "Bancos Admin",
                "data" => $res,
                "dataTable" => $data,
                //"menu" => false
            ];

            $this->vista("BancosAdmin", $datos);

        } else {
            header("location:" . RUTA . "InicioControlador");
        }

    }
    public function AgregarUsuario()
    {
        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $dni = isset($_POST["dni3"]) ? $_POST["dni3"] : "";
            $apellidoPaterno = isset($_POST["apellidopaterno3"]) ? $_POST["apellidopaterno3"] : "";
            $apellidoMaterno = isset($_POST["apellidomaterno3"]) ? $_POST["apellidomaterno3"] : "";
            $nombre = isset($_POST["nombre3"]) ? $_POST["nombre3"] : "";
            $celular = isset($_POST["telefono3"]) ? $_POST["telefono3"] : "";
            $email = isset($_POST["correo3"]) ? $_POST["correo3"] : "";
            $emailIngreso = isset($_POST["correoingreso3"]) ? $_POST["correoingreso3"] : "";
            $rol = isset($_POST["rol3"]) ? $_POST["rol3"] : "";
            $estado = isset($_POST["estado3"]) ? $_POST["estado3"] : "";
            $contrasena = isset($_POST["contrasena3"]) ? $_POST["contrasena3"] : "";

            $data2 = [
                "dni" => $dni,
                "apellidopaterno" => strtoupper($apellidoPaterno),
                "apellidomaterno" => strtoupper($apellidoMaterno),
                "nombre" => strtoupper($nombre),
                "telefono" => $celular,
                "correo" => $email,
                "correoingreso" => $emailIngreso,
                "rol" => $rol,
                "estado" => $estado,
                "contrasena" => $contrasena,
            ];

            //validacion
            if ($nombre == "") {
                array_push($errores, "<br> el nombre es requerido    ");
            }
            if ($apellidoPaterno == "") {
                array_push($errores, "<br> el apellido paterno es requerido    ");
            }
            if ($apellidoMaterno == "") {
                array_push($errores, "<br> el apellido materno es requerido    ");
            }
            if ($dni == "") {
                array_push($errores, "<br> el dni es requerido ");
            }
            if ($celular == "") {
                array_push($errores, "<br> el celular es requerido ");
            }
            if ($rol == "") {
                array_push($errores, "<br> el rol es requerido    ");
            }
            if ($estado == "") {
                array_push($errores, "<br> el  estado es requerido    ");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "<br> el correo  no es valido   ");
            }
            if (!filter_var($emailIngreso, FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "<br> el correo ingreso no es valido    ");
            }
            if ($contrasena == "") {
                array_push($errores, "<br> la contraseña es requerido     ");
            }

            if (count($errores) == 0) {
                $resul = $this->modelo->AgregarUsuarios($data2);

                if ($resul) {
                    array_push($errores, "Usuario Registrado");
                    $res = $sesion->getUsuario();
                    $data = $this->modelo->getUsuariosAdmin();
                    $datos = [
                        //"titulo" => "Bienvenido",
                        //"menu" => false,
                        //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                        //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                        "errores" => $errores,
                        "color" => "success",
                        "data" => $res,
                        "dataTable" => $data,

                        //"url" => "inicioControlador/iniciarsesion",
                        //"colorBoton" => "btn-success",
                        //"textoBoton"=>"Iniciar"

                    ];
                    $data_serialized = urlencode(base64_encode(serialize($datos)));
                    header("Location:" . RUTA . "AdminControlador/UsuariosAdmin?datos=$data_serialized&registrado=true");

                } else {

                    $data = $this->modelo->getUsuariosAdmin();
                    array_push($errores, "Hubo Un Error En El Registro<br>Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        //"titulo" => "Registro",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("UsuariosAdmin", $datos);
                }

            } else {
                $data = $this->modelo->getUsuariosAdmin();
                $datos = [
                    //"titulo" => "Registro",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("UsuariosAdmin", $datos);
            }

        }

    }
    public function AgregarBanco()
    {
        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $NumeroCuenta = isset($_POST["numeroCuenta3"]) ? $_POST["numeroCuenta3"] : "";
            $NombreBanco = isset($_POST["nombreBanco3"]) ? $_POST["nombreBanco3"] : "";
            $NombreTitular = isset($_POST["nombreTitular3"]) ? $_POST["nombreTitular3"] : "";
            $Saldo = isset($_POST["saldo3"]) ? $_POST["saldo3"] : "";
            $TipoCuenta = isset($_POST["tipoCuenta3"]) ? $_POST["tipoCuenta3"] : "";

            $data2 = [
                "numeroCuenta" => $NumeroCuenta,
                "nombreBanco" => strtoupper($NombreBanco),
                "nombreTitular" => strtoupper($NombreTitular),
                "saldo" => $Saldo,
                "tipoCuenta" => strtoupper($TipoCuenta),
            ];

            if ($NumeroCuenta == "") {
                array_push($errores, "el numero de cuenta es requerido<br><br>   ");
            }
            if ($NombreBanco == "") {
                array_push($errores, "el nombre de banco es requerido <br>   ");
            }
            if ($NombreTitular == "") {
                array_push($errores, "el nombre de titular es requerido <br>   ");
            }

            if ($TipoCuenta == "") {
                array_push($errores, "el tipo de cuenta es requerido<br> ");
            }

            if (count($errores) == 0) {
                $resul = $this->modelo->AgregarBanco($data2);
                if ($resul) {
                    array_push($errores, "Banco Registrado");
                    $res = $sesion->getUsuario();
                    $data = $this->modelo->getBancosAdmin();
                    $datos = [
                        "titulo" => "Banco Admin",
                        //"menu" => false,
                        //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                        //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                        "errores" => $errores,
                        "color" => "success",
                        "data" => $res,
                        "dataTable" => $data,

                        //"url" => "inicioControlador/iniciarsesion",
                        //"colorBoton" => "btn-success",
                        //"textoBoton"=>"Iniciar"

                    ];
                    $data_serialized = urlencode(base64_encode(serialize($datos)));
                        header("Location:" . RUTA . "AdminControlador/BancosAdmin?datos=$data_serialized&registrado=true");
                    

                } else {
                    $data = $this->modelo->getBancosAdmin();
                    array_push($errores, "Hubo Un Error En El Registro<br>Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Banco Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("BancosAdmin", $datos);
                }

            } else {
                $data = $this->modelo->getBancosAdmin();
                $datos = [
                    "titulo" => "Banco Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("BancosAdmin", $datos);

            }

        }

    }
    public function EditarUsuario()
    {

        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $idusuarios = isset($_POST["idusuarios"]) ? $_POST["idusuarios"] : "";
            $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
            $apellidoPaterno = isset($_POST["apellidopaterno"]) ? $_POST["apellidopaterno"] : "";
            $apellidoMaterno = isset($_POST["apellidomaterno"]) ? $_POST["apellidomaterno"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $celular = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
            $email = isset($_POST["correo"]) ? $_POST["correo"] : "";
            $emailIngreso = isset($_POST["correoingreso"]) ? $_POST["correoingreso"] : "";
            $rol = isset($_POST["rol"]) ? $_POST["rol"] : "";
            $estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
            $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";

            $data2 = [
                "idusuarios" => $idusuarios,
                "dni" => $dni,
                "apellidopaterno" => strtoupper($apellidoPaterno),
                "apellidomaterno" => strtoupper($apellidoMaterno),
                "nombre" => strtoupper($nombre),
                "telefono" => $celular,
                "correo" => $email,
                "correoingreso" => $emailIngreso,
                "rol" => $rol,
                "estado" => $estado,
                "contrasena" => $contrasena,
            ];

            //validacion
            if ($nombre == "") {
                array_push($errores, "el nombre es requerido <br>   ");
            }
            if ($apellidoPaterno == "") {
                array_push($errores, "el apellido paterno es requerido<br>    ");
            }
            if ($apellidoMaterno == "") {
                array_push($errores, "el apellido materno es requerido <br>   ");
            }
            if ($dni == "") {
                array_push($errores, "el dni es requerido <br>");
            }
            if ($celular == "") {
                array_push($errores, "el celular es requerido<br> ");
            }
            if ($rol == "") {
                array_push($errores, "el rol es requerido <br>   ");
            }
            if ($estado == "") {
                array_push($errores, "el  estado es requerido<br>    ");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "el correo  no es valido<br>   ");
            }
            if (!filter_var($emailIngreso, FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "el correo ingreso no es valido <br>   ");
            }
            if ($contrasena == "") {
                array_push($errores, "la contraseña es requerido <br>    ");
            }

            if (count($errores) == 0) {
                $resul = $this->modelo->EditarUsuario($data2);

                if ($resul) {
                    array_push($errores, "Usuario Editado");
                    $res = $sesion->getUsuario();

                    $data = $this->modelo->getUsuariosAdmin();
                    $datos = [
                        "titulo" => "Usuario Admin",
                        //"menu" => false,
                        //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                        //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                        "errores" => $errores,
                        "color" => "success",
                        "data" => $res,
                        "dataTable" => $data,

                        //"url" => "inicioControlador/iniciarsesion",
                        //"colorBoton" => "btn-success",
                        //"textoBoton"=>"Iniciar"

                    ];
                    $data_serialized = urlencode(base64_encode(serialize($datos)));
                    header("Location:" . RUTA . "AdminControlador/UsuariosAdmin?datos=$data_serialized&registrado=true");

                } else {

                    $data = $this->modelo->getUsuariosAdmin();
                    array_push($errores, "Error Al Editar , Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Usuario Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("UsuariosAdmin", $datos);
                }

            } else {
                $data = $this->modelo->getUsuariosAdmin();
                $datos = [
                    "titulo" => "Usuario Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("UsuariosAdmin", $datos);
            }
        }

    }
    public function BorrarUsuario($id)
    {
        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();

        $dato = $this->modelo->borrarUsuarios($id);
        if ($dato) {
            $data = $this->modelo->getUsuariosAdmin();
            array_push($errores, "Usuario Eliminado");
            $datos = [
                "titulo" => "Usuario Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "success",
                "data" => $res,
                //"data2" => $data2,
                "dataTable" => $data,

            ];
            $this->vista("UsuariosAdmin", $datos);
        } else {
            $data = $this->modelo->getUsuariosAdmin();
            array_push($errores, "Error Al Eliminar , Si Persiste Comunicate Con Su Proveedor");
            $datos = [
                "titulo" => "Usuario Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "error",
                "data" => $res,
                //"data2" => $data2,
                "dataTable" => $data,

            ];
            $this->vista("UsuariosAdmin", $datos);
        }

    }
    public function BorrarBanco($id)
    {
        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();

        $dato = $this->modelo->borrarBanco($id);
        if ($dato) {
            $data = $this->modelo->getBancosAdmin();
            array_push($errores, "Banco Eliminado");
            $datos = [
                "titulo" => "Banco Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "success",
                "data" => $res,
                //"data2" => $data2,
                "dataTable" => $data,

            ];
            $this->vista("BancosAdmin", $datos);
        } else {
            $data = $this->modelo->getBancosAdmin();
            array_push($errores, "Error Al Eliminar , Si Persiste Comunicate Con Su Proveedor");
            $datos = [
                "titulo" => "Banco Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "error",
                "data" => $res,
                //"data2" => $data2,
                "dataTable" => $data,

            ];
            $this->vista("BancosAdmin", $datos);
        }

    }
    public function EditarBanco()
    {

        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $IdBanco = isset($_POST["idBanco"]) ? $_POST["idBanco"] : "";
            $NumeroCuenta = isset($_POST["numeroCuenta"]) ? $_POST["numeroCuenta"] : "";
            $NombreBanco = isset($_POST["nombreBanco"]) ? $_POST["nombreBanco"] : "";
            $NombreTitular = isset($_POST["nombreTitular"]) ? $_POST["nombreTitular"] : "";
            $Saldo = isset($_POST["saldo"]) ? $_POST["saldo"] : "0.0";
            $TipoCuenta = isset($_POST["tipoCuenta"]) ? $_POST["tipoCuenta"] : "";

            $data2 = [
                "idBanco" => $IdBanco,
                "numeroCuenta" => $NumeroCuenta,
                "nombreBanco" => strtoupper($NombreBanco),
                "nombreTitular" => strtoupper($NombreTitular),
                "saldo" => floatval($Saldo),
                "tipoCuenta" => strtoupper($TipoCuenta),
            ];
            //validacion
            if ($NumeroCuenta == "") {
                array_push($errores, "el numero de cuenta es requerido    ");
            }
            if ($NombreBanco == "") {
                array_push($errores, "<br> el nombre de banco es requerido    ");
            }
            if ($NombreTitular == "") {
                array_push($errores, "<br> el nombre de titular es requerido    ");
            }

            if ($TipoCuenta == "") {
                array_push($errores, "<br> el tipo de cuenta es requerido ");
            }

            if (count($errores) == 0) {
                $resul = $this->modelo->EditarBanco($data2);

                if ($resul) {
                    array_push($errores, "Banco Editado");
                    $res = $sesion->getUsuario();
                    $data = $this->modelo->getBancosAdmin();
                    $datos = [
                        "titulo" => "Banco Admin",
                        //"menu" => false,
                        //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                        //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                        "errores" => $errores,
                        "color" => "success",
                        "data" => $res,
                        "dataTable" => $data,

                        //"url" => "inicioControlador/iniciarsesion",
                        //"colorBoton" => "btn-success",
                        //"textoBoton"=>"Iniciar"

                    ];
                    $data_serialized = urlencode(base64_encode(serialize($datos)));
                    header("Location:" . RUTA . "AdminControlador/BancosAdmin?datos=$data_serialized&registrado=true");

                } else {

                    $data = $this->modelo->getBancosAdmin();
                    array_push($errores, "Hubo Un Error En la Edicion<br>Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Banco Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("BancosAdmin", $datos);
                }

            } else {
                $data = $this->modelo->getBancosAdmin();
                $datos = [
                    "titulo" => "Banco Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("BancosAdmin", $datos);
            }
        }

    }
    public function ConveniosAdmin()
    {
        $sesion = new Sesion();
        $valorRol = $sesion->getUsuario()['IdRol'];
        if ($sesion->getLogin() && $valorRol[0] != 4) {
            // print "hola desde la caratula "."<br>";
            $res = $sesion->getUsuario();
            $data = $this->modelo->getConveniosAdmin();
            $datos = [
                "titulo" => "Convenios Admin",
                "data" => $res,
                "dataTable" => $data,
                //"menu" => false
            ];

            $this->vista("ConveniosAdmin", $datos);

        } else {
            header("location:" . RUTA . "InicioControlador");
        }
    }
    public function AgregarConvenio()
    {
        $AgregueCarpeta1 = false;
        $AgregueCarpeta2 = false;
        $AgregueCarpeta3 = false;
        $AgregueCarpeta4 = false;

        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $NombreInstitucion = isset($_POST["nombreInstitucion3"]) ? $_POST["nombreInstitucion3"] : "";
            $Decano = isset($_POST["decano3"]) ? $_POST["decano3"] : "";
            $TextoFirmaDecano = isset($_POST["textofirmadecano3"]) ? $_POST["textofirmadecano3"] : "";
            $DirectorAcademico = isset($_POST["directorAcademico3"]) ? $_POST["directorAcademico3"] : "";
            $TextoFirmaDirector = isset($_POST["textofirmadirector3"]) ? $_POST["textofirmadirector3"] : "";
            $Logo = isset($_FILES['archivo1']['name']) ? $_FILES['archivo1']['name'] : "";
            $FirmaDecano = isset($_FILES['archivo2']['name']) ? $_FILES['archivo2']['name'] : "";
            $FirmaDirector = isset($_FILES['archivo3']['name']) ? $_FILES['archivo3']['name'] : "";
            $Sello = isset($_FILES['archivo4']['name']) ? $_FILES['archivo4']['name'] : "";

            $data2 = [
                "NombreInstitucion" => $NombreInstitucion,
                "Decano" => $Decano,
                "TextoFirmaDecano" => $TextoFirmaDecano,
                "DirectorAcademico" => $DirectorAcademico,
                "TextoFirmaDirector" => $TextoFirmaDirector,
                "Logo" => $Logo,
                "FirmaDecano" => $FirmaDecano,
                "FirmaDirector" => $FirmaDirector,
                "Sello" => $Sello,
            ];
            //validacion
            if ($TextoFirmaDirector == "") {
                array_push($errores, "El Texto firma director es requerido<br>    ");
            }
            if ($DirectorAcademico == "") {
                array_push($errores, "El director academico es requerido<br>    ");
            }
            if ($TextoFirmaDecano == "") {
                array_push($errores, "El texto firma decano es requerido<br>   ");
            }
            if ($Decano == "") {
                array_push($errores, "El decano es requerido<br>    ");
            }
            if ($NombreInstitucion == "") {
                array_push($errores, "Nombre institucion es requerido<br>    ");
            }

            if (count($errores) == 0) {

                $ruta = "img\ImgConvenio"; // Ruta donde se guardarán las imágenes (asegúrate de tener permisos de escritura)

                $rutaTemporal1 = $_FILES['archivo1']['tmp_name'];
                $rutaTemporal2 = $_FILES['archivo2']['tmp_name'];
                $rutaTemporal3 = $_FILES['archivo3']['tmp_name'];
                $rutaTemporal4 = $_FILES['archivo4']['tmp_name'];

                if (move_uploaded_file($rutaTemporal1, $ruta . "/" . $Logo)) {
                    $AgregueCarpeta1 = true;
                } else {
                    $AgregueCarpeta1 = false;
                }

                if (move_uploaded_file($rutaTemporal2, $ruta . "/" . $FirmaDecano)) {
                    $AgregueCarpeta2 = true;
                } else {
                    $AgregueCarpeta2 = false;
                }

                if (move_uploaded_file($rutaTemporal3, $ruta . "/" . $FirmaDirector)) {
                    $AgregueCarpeta3 = true;
                } else {
                    $AgregueCarpeta3 = false;
                }

                if (move_uploaded_file($rutaTemporal4, $ruta . "/" . $Sello)) {
                    $AgregueCarpeta4 = true;
                } else {
                    $AgregueCarpeta4 = false;
                }

                if ($AgregueCarpeta1 == true && $AgregueCarpeta2 == true && $AgregueCarpeta3 == true && $AgregueCarpeta4 == true) {

                    $resul = $this->modelo->AgregarConvenio($data2);

                    if ($resul) {
                        array_push($errores, "Convenio Registrado");
                        $res = $sesion->getUsuario();
                        $data = $this->modelo->getConveniosAdmin();

                        // Serializar el array

                        $datos = [
                            "titulo" => "Convenio Admin",
                            //"menu" => false,
                            //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                            //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                            "errores" => $errores,
                            "color" => "success",
                            "data" => $res,
                            "dataTable" => $data,

                            //"url" => "inicioControlador/iniciarsesion",
                            //"colorBoton" => "btn-success",
                            //"textoBoton"=>"Iniciar"

                        ];
                        $data_serialized = urlencode(base64_encode(serialize($datos)));
                        header("Location:" . RUTA . "AdminControlador/ConveniosAdmin?datos=$data_serialized&registrado=true");

                        /*$datos = [
                    "titulo" => "Convenio Admin",
                    //"menu" => false,
                    //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                    //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                    "errores" => $errores,
                    "color" => "success",
                    "data" => $res,
                    "dataTable" => $data,

                    //"url" => "inicioControlador/iniciarsesion",
                    //"colorBoton" => "btn-success",
                    //"textoBoton"=>"Iniciar"

                    ];

                    $this->vista("ConveniosAdmin", $datos);*/
                    } else {

                        $data = $this->modelo->getConveniosAdmin();
                        array_push($errores, "Hubo Un Error En El Registro<br>Si Persiste Comunicate Con Su Proveedor");
                        $datos = [
                            "titulo" => "Convenio Admin",
                            //"menu" => false,
                            "errores" => $errores,
                            "color" => "error",
                            "data" => $res,
                            "data2" => $data2,
                            "dataTable" => $data,

                        ];

                        $this->vista("ConveniosAdmin", $datos);
                    }

                } else {

                    $data = $this->modelo->getConveniosAdmin();
                    array_push($errores, "Hubo Un Error En El Registro<br>Olvido Seleccionar La Imagen?<br>Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Convenio Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("ConveniosAdmin", $datos);

                }
            } else {
                $data = $this->modelo->getConveniosAdmin();
                $datos = [
                    "titulo" => "Convenio Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];

                $this->vista("ConveniosAdmin", $datos);
            }

        }

    }
    public function BorrarConvenio($id)
    {
        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();

        // Obtener los nombres de las cuatro imágenes antes de borrar el convenio
        $nombresImagenes = $this->modelo->obtenerNombreImagen($id);
        if (!empty($array)) {
            $var = true;
            $imagen1 = $nombresImagenes[0]['Logo'];
            $imagen2 = $nombresImagenes[0]['FirmaDecano'];
            $imagen3 = $nombresImagenes[0]['FirmaDirector'];
            $imagen4 = $nombresImagenes[0]['Sello'];

            unlink('img\ImgConvenio/' . $imagen1);
            unlink('img\ImgConvenio/' . $imagen2);
            unlink('img\ImgConvenio/' . $imagen3);
            unlink('img\ImgConvenio/' . $imagen4);

            //verificar si se borro las imagenes
            $imagenesEliminadas = true;

            if (file_exists('img\ImgConvenio/' . $imagen1) && file_exists('img\ImgConvenio/' . $imagen2) && file_exists('img\ImgConvenio/' . $imagen3) && file_exists('img\ImgConvenio/' . $imagen4)) {
                $imagenesEliminadas = false;

            }
            // Recorrer los nombres de las imágenes y borrarlas de la carpeta
            /*foreach ($nombresImagenes as $imagen) {

            if (file_exists('img\ImgConvenio/' . $imagen)) {
            unlink('img\ImgConvenio/' . $imagen);
            }
            }*/

            if ($imagenesEliminadas) {
                // Borrar el convenio en la base de datos
                $dato = $this->modelo->borrarConvenio($id);

                if ($dato) {

                    $data = $this->modelo->getConveniosAdmin();
                    array_push($errores, "Convenio Eliminado");
                    $datos = [
                        "titulo" => "Convenio Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "success",
                        "data" => $res,
                        //"data2" => $data2,
                        "dataTable" => $data,

                    ];
                    $this->vista("ConveniosAdmin", $datos);
                } else {
                    $data = $this->modelo->getConveniosAdmin();
                    array_push($errores, "Error Al Eliminar , Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Convenio Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        //"data2" => $data2,
                        "dataTable" => $data,

                    ];
                    $this->vista("ConveniosAdmin", $datos);
                }

                $data = $this->modelo->getConveniosAdmin();
                array_push($errores, "Convenio Eliminado");
                $datos = [
                    "titulo" => "Convenio Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "success",
                    "data" => $res,
                    //"data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("ConveniosAdmin", $datos);
            } else {
                $data = $this->modelo->getConveniosAdmin();
                array_push($errores, "Error Al Eliminar , Si Persiste Comunicate Con Su Proveedor");
                $datos = [
                    "titulo" => "Convenio Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    //"data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("ConveniosAdmin", $datos);
            }

            // Resto del código para mensajes de éxito y actualización de la vista

        } else {
            $data = $this->modelo->getConveniosAdmin();
            array_push($errores, "Convenio Eliminado");
            $datos = [
                "titulo" => "Convenio Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "success",
                "data" => $res,
                //"data2" => $data2,
                "dataTable" => $data,

            ];
            $this->vista("ConveniosAdmin", $datos);
        }

    }
    public function EditarConvenio($id)
    {
        $img1 = "";
        $img2 = "";
        $img3 = "";
        $img4 = "";

        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $IdConvenio = isset($_POST["IdConvenio"]) ? $_POST["IdConvenio"] : "";
            $NombreInstitucion = isset($_POST["nombreInstitucion3"]) ? $_POST["nombreInstitucion3"] : "";
            $Decano = isset($_POST["decano3"]) ? $_POST["decano3"] : "";
            $TextoFirmaDecano = isset($_POST["textofirmadecano3"]) ? $_POST["textofirmadecano3"] : "";
            $DirectorAcademico = isset($_POST["directorAcademico3"]) ? $_POST["directorAcademico3"] : "";
            $TextoFirmaDirector = isset($_POST["textofirmadirector3"]) ? $_POST["textofirmadirector3"] : "";
            $Logo = isset($_FILES['archivo1']['name']) ? $_FILES['archivo1']['name'] : "";
            $FirmaDecano = isset($_FILES['archivo2']['name']) ? $_FILES['archivo2']['name'] : "";
            $FirmaDirector = isset($_FILES['archivo3']['name']) ? $_FILES['archivo3']['name'] : "";
            $Sello = isset($_FILES['archivo4']['name']) ? $_FILES['archivo4']['name'] : "";

            $ruta = "img\ImgConvenio";

            //validacion
            if ($TextoFirmaDirector == "") {
                array_push($errores, "El Texto firma director es requerido<br>    ");
            }
            if ($DirectorAcademico == "") {
                array_push($errores, "El director academico es requerido<br>    ");
            }
            if ($TextoFirmaDecano == "") {
                array_push($errores, "El texto firma decano es requerido<br>   ");
            }
            if ($Decano == "") {
                array_push($errores, "El decano es requerido<br>    ");
            }
            if ($NombreInstitucion == "") {
                array_push($errores, "Nombre institucion es requerido<br>    ");
            }

            if (count($errores) == 0) {
                $resulid = $this->modelo->obtenerNombreImagen($IdConvenio);

                #var_dump($resulid);
                #|| $FirmaDecano==""  || $FirmaDirector=="" ||  $Sello==""
                $logoanterior1 = $resulid[0]['Logo'];
                $logoanterior2 = $resulid[0]['FirmaDecano'];
                $logoanterior3 = $resulid[0]['FirmaDirector'];
                $logoanterior4 = $resulid[0]['Sello'];

                $rutaTemporal1 = $_FILES['archivo1']['tmp_name'];

                if ($Logo == "") {

                    $img1 = $logoanterior1;
                    print("se no se iso nada");
                } else {
                    unlink($ruta . "/" . $logoanterior1);

                    move_uploaded_file($rutaTemporal1, $ruta . "/" . $Logo);
                    print("se remplaso");
                    $img1 = $Logo;
                }

                if ($FirmaDecano == "") {
                    $img2 = $logoanterior2;

                } else {
                    unlink($ruta . "/" . $logoanterior2);
                    move_uploaded_file($rutaTemporal2, $ruta . "/" . $FirmaDecano);
                    print("se remplaso");

                    $img2 = $FirmaDecano;
                }

                if ($FirmaDirector == "") {
                    $img3 = $logoanterior3;

                } else {
                    unlink($ruta . "/" . $logoanterior3);
                    move_uploaded_file($rutaTemporal3, $ruta . "/" . $FirmaDirector);
                    print("se remplaso");
                    $img3 = $FirmaDirector;
                }

                if ($Sello == "") {

                    $img4 = $logoanterior4;
                } else {
                    unlink($ruta . "/" . $logoanterior4);
                    move_uploaded_file($rutaTemporal4, $ruta . "/" . $Sello);
                    print("se remplaso");
                    $img4 = $Sello;
                }

                print($img1);
                print($img2);
                print($img3);
                print($img4);

                $data2 = [
                    "IdConvenio" => $IdConvenio,
                    "NombreInstitucion" => $NombreInstitucion,
                    "Decano" => $Decano,
                    "TextoFirmaDecano" => $TextoFirmaDecano,
                    "DirectorAcademico" => $DirectorAcademico,
                    "TextoFirmaDirector" => $TextoFirmaDirector,
                    "Logo" => $img1,
                    "FirmaDecano" => $img2,
                    "FirmaDirector" => $img3,
                    "Sello" => $img4,
                ];

                $resul = $this->modelo->EditarConvenio($data2);

                if ($resul) {
                    array_push($errores, "Convenio Editado");
                    $res = $sesion->getUsuario();
                    $data = $this->modelo->getConveniosAdmin();

                    // Serializar el array

                    $datos = [
                        "titulo" => "Convenio Admin",
                        //"menu" => false,
                        //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                        //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                        "errores" => $errores,
                        "color" => "success",
                        "data" => $res,
                        "dataTable" => $data,

                        //"url" => "inicioControlador/iniciarsesion",
                        //"colorBoton" => "btn-success",
                        //"textoBoton"=>"Iniciar"

                    ];
                    $data_serialized = urlencode(base64_encode(serialize($datos)));
                    header("Location:" . RUTA . "AdminControlador/ConveniosAdmin?datos=$data_serialized&registrado=true");

                } else {

                    $data = $this->modelo->getConveniosAdmin();
                    array_push($errores, "Hubo Un Error En Editar Convenio<br>Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Convenio Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("ConveniosAdmin", $datos);
                }

            } else {

                $data = $this->modelo->getConveniosAdmin();
                array_push($errores, "Hubo Un Error En El Registro<br>Olvido Seleccionar La Imagen?<br>Si Persiste Comunicate Con Su Proveedor");
                $datos = [
                    "titulo" => "Convenio Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];

                $this->vista("ConveniosAdmin", $datos);

            }
        } else {
            $data = $this->modelo->getConveniosAdmin();
            $datos = [
                "titulo" => "Convenio Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "error",
                "data" => $res,
                "data2" => $data2,
                "dataTable" => $data,

            ];

            $this->vista("ConveniosAdmin", $datos);
        }

    }
    public function ExpositoresAdmin()
    {
        $sesion = new Sesion();
        $valorRol = $sesion->getUsuario()['IdRol'];
        if ($sesion->getLogin() && $valorRol[0] != 4) {
            // print "hola desde la caratula "."<br>";
            $res = $sesion->getUsuario();
            $data = $this->modelo->getExpositoresAdmin();
            $datos = [
                "titulo" => "Expositores Admin",
                "data" => $res,
                "dataTable" => $data,
                //"menu" => false
            ];

            $this->vista("ExpositoresAdmin", $datos);

        } else {
            header("location:" . RUTA . "InicioControlador");
        }
    }
    public function AgregarExpositor()
    {
        $AgregueCarpeta1 = false;

        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $Dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
            $Prefijo = isset($_POST["prefijo"]) ? $_POST["prefijo"] : "";
            $ApellidoPaterno = isset($_POST["apellidoPaterno"]) ? $_POST["apellidoPaterno"] : "";
            $ApellidoMaterno = isset($_POST["apellidoMaterno"]) ? $_POST["apellidoMaterno"] : "";
            $Nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $Telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
            $Reseña = isset($_POST["reseña"]) ? $_POST["reseña"] : "";
            $Foto = isset($_FILES['archivo1']['name']) ? $_FILES['archivo1']['name'] : "";

            $data2 = [
                "Dni" => $Dni,
                "Prefijo" => strtoupper($Prefijo),
                "ApellidoPaterno" => strtoupper($ApellidoPaterno),
                "ApellidoMaterno" => strtoupper($ApellidoMaterno),
                "Nombre" => strtoupper($Nombre),
                "Telefono" => $Telefono,
                "Reseña" => $Reseña,
                "FotoPerfil" => $Foto,

            ];
            //validacion
            if ($Dni == "") {
                array_push($errores, "El DNI es requerido<br>    ");
            }
            if ($Prefijo == "") {
                array_push($errores, "El Prefijo es requerido<br>    ");
            }
            if ($ApellidoPaterno == "") {
                array_push($errores, "El Apellido Paterno es requerido<br>   ");
            }
            if ($ApellidoMaterno == "") {
                array_push($errores, "El Apellido Materno es requerido<br>    ");
            }
            if ($Nombre == "") {
                array_push($errores, "El Nombre es requerido<br>    ");
            }
            if ($Telefono == "") {
                array_push($errores, "El Telefono es requerido<br>    ");
            }
            if ($Reseña == "") {
                array_push($errores, "La Reseña es requerida<br>    ");
            }

            if (count($errores) == 0) {

                $ruta = "img\ImgExpositores"; // Ruta donde se guardarán las imágenes (asegúrate de tener permisos de escritura)

                $rutaTemporal1 = $_FILES['archivo1']['tmp_name'];

                if (move_uploaded_file($rutaTemporal1, $ruta . "/" . $Foto)) {
                    $AgregueCarpeta1 = true;
                } else {
                    $AgregueCarpeta1 = false;
                }

                if ($AgregueCarpeta1 == true) {

                    $resul = $this->modelo->AgregarExpositor($data2);

                    if ($resul) {
                        array_push($errores, "Expositor Registrado");
                        $res = $sesion->getUsuario();
                        $data = $this->modelo->getExpositoresAdmin();

                        // Serializar el array

                        $datos = [
                            "titulo" => "Expositores Admin",
                            //"menu" => false,
                            //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                            //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                            "errores" => $errores,
                            "color" => "success",
                            "data" => $res,
                            "dataTable" => $data,

                            //"url" => "inicioControlador/iniciarsesion",
                            //"colorBoton" => "btn-success",
                            //"textoBoton"=>"Iniciar"

                        ];
                        $data_serialized = urlencode(base64_encode(serialize($datos)));
                        header("Location:" . RUTA . "AdminControlador/ExpositoresAdmin?datos=$data_serialized&registrado=true");

                        /*$datos = [
                    "titulo" => "Convenio Admin",
                    //"menu" => false,
                    //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                    //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                    "errores" => $errores,
                    "color" => "success",
                    "data" => $res,
                    "dataTable" => $data,

                    //"url" => "inicioControlador/iniciarsesion",
                    //"colorBoton" => "btn-success",
                    //"textoBoton"=>"Iniciar"

                    ];

                    $this->vista("ConveniosAdmin", $datos);*/
                    } else {

                        $data = $this->modelo->getExpositoresAdmin();
                        array_push($errores, "Hubo Un Error En El Registro<br>Si Persiste Comunicate Con Su Proveedor");
                        $datos = [
                            "titulo" => "Expositores Admin",
                            //"menu" => false,
                            "errores" => $errores,
                            "color" => "error",
                            "data" => $res,
                            "data2" => $data2,
                            "dataTable" => $data,

                        ];

                        $this->vista("ExpositoresAdmin", $datos);
                    }

                } else {

                    $data = $this->modelo->getConveniosAdmin();
                    array_push($errores, "Hubo Un Error En El Registro<br>Olvido Seleccionar La Imagen?<br>Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Expositores Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("ExpositoresAdmin", $datos);

                }
            } else {
                $data = $this->modelo->getConveniosAdmin();
                $datos = [
                    "titulo" => "Expositores Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];

                $this->vista("ExpositoresAdmin", $datos);
            }

        }

    }
    public function borrarExpositor($id)
    {
        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();

        // Obtener los nombres de las cuatro imágenes antes de borrar el convenio
        $nombresImagenes = $this->modelo->obtenerNombreImagenExpositor($id);

        $var = true;
        $imagen1 = $nombresImagenes[0]['FotoPerfil'];

        unlink('img\ImgConvenio/' . $imagen1);

        //verificar si se borro las imagenes
        $imagenesEliminadas = true;

        if (file_exists('img\ImgExpositores/' . $imagen1)) {
            $imagenesEliminadas = false;

        }
        // Recorrer los nombres de las imágenes y borrarlas de la carpeta
        /*foreach ($nombresImagenes as $imagen) {

        if (file_exists('img\ImgConvenio/' . $imagen)) {
        unlink('img\ImgConvenio/' . $imagen);
        }
        }*/

        if ($imagenesEliminadas) {
            // Borrar el expositor en la base de datos
            $dato = $this->modelo->borrarExpositor($id);

            if ($dato) {

                $data = $this->modelo->getExpositoresAdmin();
                array_push($errores, "Expositor Eliminado");
                $datos = [
                    "titulo" => "Expositores Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "success",
                    "data" => $res,
                    //"data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("ExpositoresAdmin", $datos);
            } else {
                $data = $this->modelo->getExpositoresAdmin();
                array_push($errores, "Error Al Eliminar , Si Persiste Comunicate Con Su Proveedor");
                $datos = [
                    "titulo" => "Expositores Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    //"data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("ExpositoresAdmin", $datos);
            }

            $data = $this->modelo->getExpositoresAdmin();
            array_push($errores, "Expositor Eliminado");
            $datos = [
                "titulo" => "Expositores Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "success",
                "data" => $res,
                //"data2" => $data2,
                "dataTable" => $data,

            ];
            $this->vista("ExpositoresAdmin", $datos);
        } else {
            $data = $this->modelo->getExpositoresAdmin();
            array_push($errores, "Error Al Eliminar , Si Persiste Comunicate Con Su Proveedor");
            $datos = [
                "titulo" => "Expositores Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "error",
                "data" => $res,
                //"data2" => $data2,
                "dataTable" => $data,

            ];
            $this->vista("ExpositoresAdmin", $datos);
        }

        // Resto del código para mensajes de éxito y actualización de la vista

    }
    public function EditarExpositor($id)
    {
        $img1 = "";

        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $IdExpositor = isset($_POST["IdExpositores"]) ? $_POST["IdExpositores"] : "";
            $Dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
            $Prefijo = isset($_POST["prefijo"]) ? $_POST["prefijo"] : "";
            $ApellidoPaterno = isset($_POST["apellidoPaterno"]) ? $_POST["apellidoPaterno"] : "";
            $ApellidoMaterno = isset($_POST["apellidoMaterno"]) ? $_POST["apellidoMaterno"] : "";
            $Nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $Telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
            $Reseña = isset($_POST["reseña"]) ? $_POST["reseña"] : "";
            $Foto = isset($_FILES['archivo1']['name']) ? $_FILES['archivo1']['name'] : "";

            $ruta = "img\ImgExpositores";

            //validacion

            if ($Dni == "") {
                array_push($errores, "El DNI es requerido<br>    ");
            }
            if ($Prefijo == "") {
                array_push($errores, "El Prefijo es requerido<br>    ");
            }
            if ($ApellidoPaterno == "") {
                array_push($errores, "El Apellido Paterno es requerido<br>   ");
            }
            if ($ApellidoMaterno == "") {
                array_push($errores, "El Apellido Materno es requerido<br>    ");
            }
            if ($Nombre == "") {
                array_push($errores, "El Nombre es requerido<br>    ");
            }
            if ($Telefono == "") {
                array_push($errores, "El Telefono es requerido<br>    ");
            }
            if ($Reseña == "") {
                array_push($errores, "La Reseña es requerida<br>    ");
            }

            if (count($errores) == 0) {
                $resulid = $this->modelo->obtenerNombreImagenExpositor($IdExpositor);

                #var_dump($resulid);
                #|| $FirmaDecano==""  || $FirmaDirector=="" ||  $Sello==""
                $logoanterior1 = $resulid[0]['FotoPerfil'];

                $rutaTemporal1 = $_FILES['archivo1']['tmp_name'];

                if ($Foto == "") {

                    $img1 = $logoanterior1;
                    print("se no se iso nada");
                } else {
                    unlink($ruta . "/" . $logoanterior1);

                    move_uploaded_file($rutaTemporal1, $ruta . "/" . $Foto);
                    print("se remplaso");
                    $img1 = $Foto;
                }

                print($img1);

                $data2 = [
                    "IdExpositor" => $IdExpositor,
                    "Dni" => $Dni,
                    "Prefijo" => strtoupper($Prefijo),
                    "ApellidoPaterno" => strtoupper($ApellidoPaterno),
                    "ApellidoMaterno" => strtoupper($ApellidoMaterno),
                    "Nombre" => strtoupper($Nombre),
                    "Telefono" => $Telefono,
                    "Reseña" => $Reseña,
                    "FotoPerfil" => $img1,

                ];

                $resul = $this->modelo->EditarExpositor($data2);

                if ($resul) {
                    array_push($errores, "Expositor Editado");
                    $res = $sesion->getUsuario();
                    $data = $this->modelo->getExpositoresAdmin();

                    // Serializar el array

                    $datos = [
                        "titulo" => "Expositores Admin",
                        //"menu" => false,
                        //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                        //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                        "errores" => $errores,
                        "color" => "success",
                        "data" => $res,
                        "dataTable" => $data,

                        //"url" => "inicioControlador/iniciarsesion",
                        //"colorBoton" => "btn-success",
                        //"textoBoton"=>"Iniciar"

                    ];
                    $data_serialized = urlencode(base64_encode(serialize($datos)));
                    header("Location:" . RUTA . "AdminControlador/ExpositoresAdmin?datos=$data_serialized&registrado=true");

                } else {

                    $data = $this->modelo->getExpositoresAdmin();
                    array_push($errores, "Hubo Un Error En Editar Convenio<br>Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Expositores Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("ExpositoresAdmin", $datos);
                }

            } else {

                $data = $this->modelo->getExpositoresAdmin();
                array_push($errores, "Hubo Un Error En El Registro<br>Olvido Seleccionar La Imagen?<br>Si Persiste Comunicate Con Su Proveedor");
                $datos = [
                    "titulo" => "Expositores Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];

                $this->vista("ExpositoresAdmin", $datos);

            }
        } else {
            $data = $this->modelo->getExpositoresAdmin();
            $datos = [
                "titulo" => "Expositores Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "error",
                "data" => $res,
                "data2" => $data2,
                "dataTable" => $data,

            ];

            $this->vista("ExpositoresAdmin", $datos);
        }

    }
    public function FirmasAdmin()
    {
        $sesion = new Sesion();
        $valorRol = $sesion->getUsuario()['IdRol'];
        if ($sesion->getLogin() && $valorRol[0] != 4) {
            // print "hola desde la caratula "."<br>";
            $res = $sesion->getUsuario();
            $data = $this->modelo->getFirmasAdmin();
            $datos = [
                "titulo" => "Firmas Admin",
                "data" => $res,
                "dataTable" => $data,
                //"menu" => false
            ];

            $this->vista("FirmasAdmin", $datos);

        } else {
            header("location:" . RUTA . "InicioControlador");
        }
    }
    public function AgregarFirma()
    {
        $AgregueCarpeta1 = false;
        $AgregueCarpeta2 = false;

        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $Alias = isset($_POST["Alias"]) ? $_POST["Alias"] : "";
            $Texto1 = isset($_POST["Texto1"]) ? $_POST["Texto1"] : "";
            $Texto2 = isset($_POST["Texto2"]) ? $_POST["Texto2"] : "";

            $Foto1 = isset($_FILES['ImagenFirma']['name']) ? $_FILES['ImagenFirma']['name'] : "";
            $Foto2 = isset($_FILES['ImagenSello']['name']) ? $_FILES['ImagenSello']['name'] : "";

            $data2 = [
                "Alias" => $Alias,
                "Texto1" => $Texto1,
                "Texto2" => $Texto2,
                "ImagenFirma" => $Foto1,
                "ImagenSello" => $Foto2,

            ];
            //validacion
            if ($Alias == "") {
                array_push($errores, "El Alias es requerido<br>    ");
            }
            if ($Texto1 == "") {
                array_push($errores, "El Texto1 es requerido<br>    ");
            }
            if ($Texto2 == "") {
                array_push($errores, "El Texto2 Paterno es requerido<br>   ");
            }

            if (count($errores) == 0) {

                $ruta = "img\ImgFirmas"; // Ruta donde se guardarán las imágenes (asegúrate de tener permisos de escritura)

                $rutaTemporal1 = $_FILES['ImagenFirma']['tmp_name'];
                $rutaTemporal2 = $_FILES['ImagenSello']['tmp_name'];

                if (move_uploaded_file($rutaTemporal1, $ruta . "/" . $Foto1)) {
                    $AgregueCarpeta1 = true;
                } else {
                    $AgregueCarpeta1 = false;
                }
                if (move_uploaded_file($rutaTemporal2, $ruta . "/" . $Foto2)) {
                    $AgregueCarpeta2 = true;
                } else {
                    $AgregueCarpeta2 = false;
                }

                if ($AgregueCarpeta1 == true && $AgregueCarpeta2 == true) {

                    $resul = $this->modelo->AgregarFirma($data2);

                    if ($resul) {
                        array_push($errores, "Firma Registrada");
                        $res = $sesion->getUsuario();
                        $data = $this->modelo->getFirmasAdmin();

                        // Serializar el array

                        $datos = [
                            "titulo" => "Firmas Admin",
                            //"menu" => false,
                            //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                            //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                            "errores" => $errores,
                            "color" => "success",
                            "data" => $res,
                            "dataTable" => $data,

                            //"url" => "inicioControlador/iniciarsesion",
                            //"colorBoton" => "btn-success",
                            //"textoBoton"=>"Iniciar"

                        ];
                        $data_serialized = urlencode(base64_encode(serialize($datos)));
                        header("Location:" . RUTA . "AdminControlador/FirmasAdmin?datos=$data_serialized&registrado=true");

                        /*$datos = [
                    "titulo" => "Convenio Admin",
                    //"menu" => false,
                    //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                    //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                    "errores" => $errores,
                    "color" => "success",
                    "data" => $res,
                    "dataTable" => $data,

                    //"url" => "inicioControlador/iniciarsesion",
                    //"colorBoton" => "btn-success",
                    //"textoBoton"=>"Iniciar"

                    ];

                    $this->vista("ConveniosAdmin", $datos);*/
                    } else {

                        $data = $this->modelo->getFirmasAdmin();
                        array_push($errores, "Hubo Un Error En El Registro<br>Si Persiste Comunicate Con Su Proveedor");
                        $datos = [
                            "titulo" => "Firmas Admin",
                            //"menu" => false,
                            "errores" => $errores,
                            "color" => "error",
                            "data" => $res,
                            "data2" => $data2,
                            "dataTable" => $data,

                        ];

                        $this->vista("FirmasAdmin", $datos);
                    }

                } else {

                    $data = $this->modelo->getFirmasAdmin();
                    array_push($errores, "Hubo Un Error En El Registro<br>Olvido Seleccionar La Imagen?<br>Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Firmas Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("FirmasAdmin", $datos);

                }
            } else {
                $data = $this->modelo->getFirmasAdmin();
                $datos = [
                    "titulo" => "Firmas Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];

                $this->vista("FirmasAdmin", $datos);
            }

        }

    }
    public function borrarFirma($id)
    {
        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();

        // Obtener los nombres de las cuatro imágenes antes de borrar el convenio
        $nombresImagenes = $this->modelo->obtenerNombreImagenesFirma($id);

        $var = true;
        $imagen1 = $nombresImagenes[0]['ImagenFirma'];
        $imagen2 = $nombresImagenes[0]['ImagenSello'];

        unlink('img\ImgFirmas/' . $imagen1);
        unlink('img\ImgFirmas/' . $imagen2);

        //verificar si se borro las imagenes
        $imagenesEliminadas = true;

        if (file_exists('img\ImgFirmas/' . $imagen1)) {
            $imagenesEliminadas = false;

        }
        if (file_exists('img\ImgFirmas/' . $imagen2)) {
            $imagenesEliminadas = false;

        }
        // Recorrer los nombres de las imágenes y borrarlas de la carpeta
        /*foreach ($nombresImagenes as $imagen) {

        if (file_exists('img\ImgConvenio/' . $imagen)) {
        unlink('img\ImgConvenio/' . $imagen);
        }
        }*/

        if ($imagenesEliminadas) {
            // Borrar el expositor en la base de datos
            $dato = $this->modelo->borrarFirma($id);

            if ($dato) {

                $data = $this->modelo->getFirmasAdmin();
                array_push($errores, "Firma Eliminada");
                $datos = [
                    "titulo" => "Firmas Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "success",
                    "data" => $res,
                    //"data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("FirmasAdmin", $datos);
            } else {
                $data = $this->modelo->getFirmasAdmin();
                array_push($errores, "Error Al Eliminar , Si Persiste Comunicate Con Su Proveedor");
                $datos = [
                    "titulo" => "Firmas Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    //"data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("FirmasAdmin", $datos);
            }

            $data = $this->modelo->getFirmasAdmin();
            array_push($errores, "Expositor Eliminado");
            $datos = [
                "titulo" => "Firmas Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "success",
                "data" => $res,
                //"data2" => $data2,
                "dataTable" => $data,

            ];
            $this->vista("FirmasAdmin", $datos);
        } else {
            $data = $this->modelo->getFirmasAdmin();
            array_push($errores, "Error Al Eliminar , Si Persiste Comunicate Con Su Proveedor");
            $datos = [
                "titulo" => "Firmas Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "error",
                "data" => $res,
                //"data2" => $data2,
                "dataTable" => $data,

            ];
            $this->vista("FirmasAdmin", $datos);
        }

        // Resto del código para mensajes de éxito y actualización de la vista

    }
    public function EditarFirma($id)
    {
        $img1 = "";
        $img2 = "";

        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $IdFirmas = isset($_POST["IdDirectorioFirmas"]) ? $_POST["IdDirectorioFirmas"] : "";
            $Alias = isset($_POST["Alias"]) ? $_POST["Alias"] : "";
            $Texto1 = isset($_POST["Texto1"]) ? $_POST["Texto1"] : "";
            $Texto2 = isset($_POST["Texto2"]) ? $_POST["Texto2"] : "";

            $Foto1 = isset($_FILES['ImagenFirma']['name']) ? $_FILES['ImagenFirma']['name'] : "";
            $Foto2 = isset($_FILES['ImagenSello']['name']) ? $_FILES['ImagenSello']['name'] : "";

            $ruta = "img\ImgFirmas";

            //validacion

            //validacion
            if ($Alias == "") {
                array_push($errores, "El Alias es requerido<br>    ");
            }
            if ($Texto1 == "") {
                array_push($errores, "El Texto1 es requerido<br>    ");
            }
            if ($Texto2 == "") {
                array_push($errores, "El Texto2 Paterno es requerido<br>   ");
            }

            if (count($errores) == 0) {
                $resulid = $this->modelo->obtenerNombreImagenesFirma($IdFirmas);

                #var_dump($resulid);
                #|| $FirmaDecano==""  || $FirmaDirector=="" ||  $Sello==""
                $logoanterior1 = $resulid[0]['ImagenFirma'];
                $logoanterior2 = $resulid[0]['ImagenSello'];

                $rutaTemporal1 = $_FILES['ImagenFirma']['tmp_name'];
                $rutaTemporal2 = $_FILES['ImagenSello']['tmp_name'];

                if ($Foto1 == "") {

                    $img1 = $logoanterior1;
                    print("se no se iso nada");
                } else {
                    unlink($ruta . "/" . $logoanterior1);

                    move_uploaded_file($rutaTemporal1, $ruta . "/" . $Foto1);
                    print("se remplaso");
                    $img1 = $Foto1;
                }
                if ($Foto2 == "") {

                    $img2 = $logoanterior2;
                    print("se no se iso nada");
                } else {
                    unlink($ruta . "/" . $logoanterior2);

                    move_uploaded_file($rutaTemporal2, $ruta . "/" . $Foto2);
                    print("se remplaso");
                    $img2 = $Foto2;
                }

                $data2 = [
                    "IdDirectorioFirmas" => $IdFirmas,
                    "Alias" => $Alias,
                    "Texto1" => $Texto1,
                    "Texto2" => $Texto2,
                    "ImagenFirma" => $img1,
                    "ImagenSello" => $img2,

                ];

                $resul = $this->modelo->EditarFirma($data2);

                if ($resul) {
                    array_push($errores, "Firma Editada");
                    $res = $sesion->getUsuario();
                    $data = $this->modelo->getFirmasAdmin();

                    // Serializar el array

                    $datos = [
                        "titulo" => "Firmas Admin",
                        //"menu" => false,
                        //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                        //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                        "errores" => $errores,
                        "color" => "success",
                        "data" => $res,
                        "dataTable" => $data,

                        //"url" => "inicioControlador/iniciarsesion",
                        //"colorBoton" => "btn-success",
                        //"textoBoton"=>"Iniciar"

                    ];
                    $data_serialized = urlencode(base64_encode(serialize($datos)));
                    header("Location:" . RUTA . "AdminControlador/FirmasAdmin?datos=$data_serialized&registrado=true");

                } else {

                    $data = $this->modelo->getFirmasAdmin();
                    array_push($errores, "Hubo Un Error En Editar Convenio<br>Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Firmas Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("FirmasAdmin", $datos);
                }

            } else {

                $data = $this->modelo->getFirmasAdmin();
                array_push($errores, "Hubo Un Error En El Registro<br>Olvido Seleccionar La Imagen?<br>Si Persiste Comunicate Con Su Proveedor");
                $datos = [
                    "titulo" => "Firmas Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];

                $this->vista("FirmasAdmin", $datos);

            }
        } else {
            $data = $this->modelo->getFirmasAdmin();
            $datos = [
                "titulo" => "Firmas Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "error",
                "data" => $res,
                "data2" => $data2,
                "dataTable" => $data,

            ];

            $this->vista("FirmasAdmin", $datos);
        }

    }
    public function ProductosAdmin()
    {
        $sesion = new Sesion();
        $valorRol = $sesion->getUsuario()['IdRol'];
        if ($sesion->getLogin() && $valorRol[0] != 4) {
            // print "hola desde la caratula "."<br>";
            $res = $sesion->getUsuario();
            $data = $this->modelo->getProductosAdmin();
            $datos = [
                "titulo" => "Productos Admin",
                "data" => $res,
                "dataTable" => $data,
                //"menu" => false
            ];

            $this->vista("ProductosAdmin", $datos);

        } else {
            header("location:" . RUTA . "InicioControlador");
        }
    }
    public function AgregarProductos()
    {
        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $Dominio = isset($_POST["Dominio"]) ? $_POST["Dominio"] : "";
            $NombreProducto = isset($_POST["NombreProducto"]) ? $_POST["NombreProducto"] : "";
            $Descripcion = isset($_POST["Descripcion"]) ? $_POST["Descripcion"] : "";
           

            $data2 = [
                "NombreProducto" => strtoupper($Dominio),
                "Dominio" => strtoupper($NombreProducto),
                "Descripcion" => strtoupper($Descripcion),
                
            ];

            if ($Dominio == "") {
                array_push($errores, "el Dominio es requerido<br><br>   ");
            }
            if ($NombreProducto == "") {
                array_push($errores, "el Nombre Producto es requerido <br>   ");
            }
            if ($Descripcion == "") {
                array_push($errores, "el Descripcion es requerido <br>   ");
            }

            

            if (count($errores) == 0) {
                $resul = $this->modelo->AgregarProductos($data2);
                if ($resul) {
                    array_push($errores, "Producto Registrado");
                    $res = $sesion->getUsuario();
                    $data = $this->modelo->getProductosAdmin();
                    $datos = [
                        "titulo" => "Productos Admin",
                        //"menu" => false,
                        //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                        //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                        "errores" => $errores,
                        "color" => "success",
                        "data" => $res,
                        "dataTable" => $data,

                        //"url" => "inicioControlador/iniciarsesion",
                        //"colorBoton" => "btn-success",
                        //"textoBoton"=>"Iniciar"

                    ];
                    $data_serialized = urlencode(base64_encode(serialize($datos)));
                        header("Location:" . RUTA . "AdminControlador/ProductosAdmin?datos=$data_serialized&registrado=true");
                    
                

                } else {
                    $data = $this->modelo->getProductosAdmin();
                    array_push($errores, "Hubo Un Error En El Registro<br>Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Productos Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("ProductosAdmin", $datos);
                }

            } else {
                $data = $this->modelo->getProductosAdmin();
                $datos = [
                    "titulo" => "Productos Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("ProductosAdmin", $datos);

            }

        }

    }
    public function BorrarProductos($id)
    {
        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();

        $dato = $this->modelo->borrarProductos($id);
        if ($dato) {
            $data = $this->modelo->getProductosAdmin();
            array_push($errores, "Producto Eliminado");
            $datos = [
                "titulo" => "Productos Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "success",
                "data" => $res,
                //"data2" => $data2,
                "dataTable" => $data,

            ];
            $this->vista("ProductosAdmin", $datos);
        } else {
            $data = $this->modelo->getProductosAdmin();
            array_push($errores, "Error Al Eliminar , Si Persiste Comunicate Con Su Proveedor");
            $datos = [
                "titulo" => "Productos Admin",
                //"menu" => false,
                "errores" => $errores,
                "color" => "error",
                "data" => $res,
                //"data2" => $data2,
                "dataTable" => $data,

            ];
            $this->vista("ProductosAdmin", $datos);
        }

    }
    public function EditarProducto()
    {

        $sesion = new Sesion();
        $res = $sesion->getUsuario();
        $errores = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $IdProducto = isset($_POST["IdProducto"]) ? $_POST["IdProducto"] : "";
            $Dominio = isset($_POST["Dominio"]) ? $_POST["Dominio"] : "";
            $NombreProducto = isset($_POST["NombreProducto"]) ? $_POST["NombreProducto"] : "";
            $Descripcion = isset($_POST["Descripcion"]) ? $_POST["Descripcion"] : "";

            $data2 = [
                "IdProducto" => $IdProducto,
                "Dominio" => strtoupper($Dominio),
                "NombreProducto" => $NombreProducto,
                "Descripcion" => $Descripcion,
                
            ];
            //validacion
            if ($Dominio == "") {
                array_push($errores, "el Dominio es requerido    ");
            }
            if ($NombreProducto == "") {
                array_push($errores, "<br> el Nombre Producto es requerido    ");
            }
            if ($Descripcion == "") {
                array_push($errores, "<br> el Descripcion es requerido    ");
            }


            if (count($errores) == 0) {
                $resul = $this->modelo->EditarProducto($data2);

                if ($resul) {
                    array_push($errores, "Producto Editado");
                    $res = $sesion->getUsuario();
                    $data = $this->modelo->getProductosAdmin();
                    $datos = [
                        "titulo" => "Productos Admin",
                        //"menu" => false,
                        //"subtitulo" => "Bienvenid@ a Volver a vivir von Responsabilidad",
                        //"texto"=>"Bienvenid@ , usted se registro correctamente <br>Al ingresar al nuestra pagina le recomendamos ver cada uno de nuestros eventos programados.<br>Al registrarse usted recibira notificaciones para avisarle de los nuevos eventos programados.<br>Buen dia. ",
                        "errores" => $errores,
                        "color" => "success",
                        "data" => $res,
                        "dataTable" => $data,

                        //"url" => "inicioControlador/iniciarsesion",
                        //"colorBoton" => "btn-success",
                        //"textoBoton"=>"Iniciar"

                    ];
                    $data_serialized = urlencode(base64_encode(serialize($datos)));
                    header("Location:" . RUTA . "AdminControlador/ProductosAdmin?datos=$data_serialized&registrado=true");

                } else {

                    $data = $this->modelo->getProductosAdmin();
                    array_push($errores, "Hubo Un Error En la Edicion<br>Si Persiste Comunicate Con Su Proveedor");
                    $datos = [
                        "titulo" => "Productos Admin",
                        //"menu" => false,
                        "errores" => $errores,
                        "color" => "error",
                        "data" => $res,
                        "data2" => $data2,
                        "dataTable" => $data,

                    ];

                    $this->vista("ProductosAdmin", $datos);
                }

            } else {
                $data = $this->modelo->getProductosAdmin();
                $datos = [
                    "titulo" => "Productos Admin",
                    //"menu" => false,
                    "errores" => $errores,
                    "color" => "error",
                    "data" => $res,
                    "data2" => $data2,
                    "dataTable" => $data,

                ];
                $this->vista("ProductosAdmin", $datos);
            }
        }

    }
    ///
    public function ServiciosAdmin()
    {
        $sesion = new Sesion();
        $valorRol = $sesion->getUsuario()['IdRol'];
        if ($sesion->getLogin() && $valorRol[0] != 4) {
            // print "hola desde la caratula "."<br>";
            $res = $sesion->getUsuario();
            $data = $this->modelo->getServiciosAdmin();
            $expositores = $this->modelo->getExpositoresServicioAdmin();
            $Tipos = $this->modelo->getTiposCursosAdmin();
            $Productos = $this->modelo->getProductosServiciosAdmin();
            $Expositores = $this->modelo->getExpositoresServiciosAdmin();
            
            
            $datos = [
                "titulo" => "Servicios Admin",
                "data" => $res,
                "dataTable" => $data,
                "datatable2"=> $expositores,
                "datatable3"=> $Tipos,
                "datatable4"=> $Productos,
                "datatable5"=> $Expositores,
                //"menu" => false
            ];

            $this->vista("ServiciosAdmin", $datos);

        } else {
            header("location:" . RUTA . "InicioControlador");
        }

    }   

}
