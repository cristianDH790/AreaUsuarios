<?php  

class InicioModelo{
    private $db;
    function __construct(  ){
        $this->db = new MYSQLdb();
        
    }

    function VerificarUsuario($usuario,$clave){
        $errores=array();
    
        $sql = "SELECT * FROM usuarios WHERE Email='".$usuario."'";
        // $pass = hash_hmac("sha512", $clave, "mimamamemima");
        // $clave= substr($clave,0,200);
        //consulta
        $pass=$clave;
        $data = $this->db->query($sql);
        //validacion
        if(empty($data)){
            array_push($errores,"No existe ese usuario");
        }else if($pass!=$data["Contrasena"]){
            array_push($errores,"Clave de acceso erronea");
        }
        return $errores;
    }

    

    

    function VericarRolyEstado($correo,$clave){
        $sql="SELECT IdRol , IdEstado FROM usuarios where Email='$correo' and  Contrasena='$clave' ";
        $data=$this->db->querySelect($sql);
        return $data;
    }


    function getUsuarioCorreo($correo){
        $sql = "SELECT * FROM usuarios WHERE Email='".$correo."'";
        $data = $this->db->query($sql);
        return $data;
         
     }
    
    
    
    
}