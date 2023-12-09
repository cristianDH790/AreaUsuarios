<?php
/*control maneja la url y lansa los procesos */ 
/*el primer elemento es el objeto o controlador
el segundo elemento es el metodo o accion
el tercero y posterior son los parametros 
*/ 
class Control{
    protected $controlador="InicioControlador";
    protected $metodo="caratula";
    protected $parametros=[];


    function __construct(){
        //print "bienvenido ";
        //instanciamos la clase MYSQLdb     
        //$db=new MYSQLdb();
        $url = $this->serararURL();
        //vemos la url
        //var_dump($url);


        //verificamos que la url no este vacia y que exista el archivo 
        if($url != "" && file_exists("../app/controllers/".ucwords($url[0]).".php")){
            $this->controlador=ucwords($url[0]);
            unset($url[0]);
            //var_dump($url);
        }


         //cargamos la calse del controlador
         require_once("../app/controllers/".ucwords($this->controlador).".php");
         //instanciamos la clase controlador
         $this->controlador=new $this->controlador;  
         
         
         //preguntamos si dentro del url e esta el metodo [1]
         if(isset($url[1])){
            //verificamos si existe el metodo
            if(method_exists($this->controlador,$url[1])){
                $this->metodo=$url[1];
                //eliminar pero no recorrer
                unset($url[1]);
            }
         }
         //

         $this->parametros =$url ? array_values($url):[];
        //print "<br>METODOS : ".$this->metodo."<br>";
        //var_dump($this->parametros);
        call_user_func_array([$this->controlador,$this->metodo],$this->parametros);


        
    }

    //metodo separa url
    function serararURL(){
        $url="";
        //recibimos la url por el metodo get
        if(isset($_GET["url"])){
            //eliminamos el caracter final si existe
            $url=rtrim($_GET["url"],"/" );
            $url=rtrim($_GET["url"],"\\" );
            //limpiamos caracteres no propios para la url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //separamos la url
            $url=explode("/",$url);
        }
        return $url;

    }
 }
?>