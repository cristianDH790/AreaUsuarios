<?php  
/* manejo de la base de datos */
class   MYSQLdb
{
 private $host="localhost";
 private $usuario="root";
 private $clave="";
 private $db="AreaUsuarios";
 private $conn;
    function __construct(){
        //hacemos la coneccion
      $this->conn = mysqli_connect($this->host,$this->usuario,$this->clave,$this->db);
      if (mysqli_connect_errno()){
        printf("Error: en la conexion a la base de datos %s",mysqli_connect_errno()); exit();

      }else{
        //print "conexion a la base de datos exitosa"."<br>";
      }


      if(!mysqli_set_charset($this->conn,'utf8')){
        printf("Error: en la conversion de caracteres %s",mysqli_connect_error()); exit();
      }else{
        //print "el conjunto de caracteres es:".mysqli_character_set_name($this->conn)."<br>";
      }


    }
    //regresa un solo registro en un arreglo asociado
    

    function query($sql){
      $data = array();
      $r = mysqli_query($this->conn, $sql);
      if($r){
        if(mysqli_num_rows($r)>0){
          $data = mysqli_fetch_assoc($r);
        }
      }
      
      return $data;
    }


    function querySelect($sql){
      $data = array();
      $r = mysqli_query($this->conn, $sql);
      if($r){
        while($row = mysqli_fetch_assoc($r)){
          array_push($data,$row);
        }
        
      }
      
      return $data;
    }
  
    //Query regresa un valor booleano
    function queryNoSelect($sql){
      $r = mysqli_query($this->conn, $sql);
      return $r;
    }
}

?>