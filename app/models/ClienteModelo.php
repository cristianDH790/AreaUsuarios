<?php  

class ClienteModelo{
    private $db;
    function __construct(  ){
        $this->db = new MYSQLdb();
        
    }
}