<?php

class AdminModelo
{
    private $db;
    public function __construct()
    {
        $this->db = new MYSQLdb();

    }
    public function getUsuariosAdmin()
    {
        $sql = "SELECT * FROM usuarios WHERE IdRol != '4'";
        $data = $this->db->querySelect($sql);
        return $data;

    }
    public function getBancosAdmin()
    {
        $sql = "SELECT * FROM banco ";
        $data = $this->db->querySelect($sql);
        return $data;

    }
    public function getConveniosAdmin()
    {
        $sql = "SELECT * FROM convenios ";
        $data = $this->db->querySelect($sql);
        return $data;

    }
    public function validaCuentabanco($nCuenta)
    {
        $sql = "SELECT * FROM banco WHERE NumeroCuenta='" . $nCuenta . "'";
        $data = $this->db->query($sql);
        return (count($data) == 0) ? true : false;

    }
    public function AgregarBanco($data)
    {
        $r2 = false;
        $r = $this->validaCuentabanco($data["numeroCuenta"]);

        //return $r;
        if ($r) {
            $sql = "INSERT INTO banco VALUES(0,";
            $sql .= "'" . $data['numeroCuenta'] . "',";
            $sql .= "'" . $data['nombreBanco'] . "',";
            $sql .= "'" . $data['nombreTitular'] . "',";
            $sql .= "'" . $data['saldo'] . "',";
            $sql .= "'" . $data['tipoCuenta'] . "');";

            $r2 = $this->db->queryNoSelect($sql);

            return $r2;

        } else {
            return $r2;
        }
    }
    public function validaCorreo($correo)
    {
        $sql = "SELECT * FROM usuarios WHERE Email='" . $correo . "'";
        $data = $this->db->query($sql);
        return (count($data) == 0) ? true : false;

    }
    public function AgregarUsuarios($data)
    {
        $r2 = false;
        $r = $this->validaCorreo($data["correo"]);

        //return $r;
        if ($r) {
            $sql = "INSERT INTO usuarios VALUES(0,";
            $sql .= "'" . $data['dni'] . "',";
            $sql .= "'" . $data['apellidopaterno'] . "',";
            $sql .= "'" . $data['apellidomaterno'] . "',";
            $sql .= "'" . $data['nombre'] . "',";
            $sql .= "'" . $data['telefono'] . "',";
            $sql .= "'" . $data['correo'] . "',";
            $sql .= "'" . $data['correoingreso'] . "',";
            $sql .= "'" . $data['rol'] . "',";
            $sql .= "'" . $data['estado'] . "',";
            $sql .= "'" . $data['contrasena'] . "');";

            $r2 = $this->db->queryNoSelect($sql);

            return $r2;

        } else {
            return $r2;
        }
        // return $r;

    }
    public function EditarUsuario($data)
    {
        $r2 = false;
        //$r=$this->validaCorreo($data["correo"]);
        //if($r){

        $sql = "UPDATE  usuarios SET ";
        $sql .= "Dni='" . $data['dni'] . "',";
        $sql .= "ApellidoPaterno='" . $data['apellidopaterno'] . "',";
        $sql .= "ApellidoMaterno='" . $data['apellidomaterno'] . "',";
        $sql .= "Nombre='" . $data['nombre'] . "',";
        $sql .= "Telefono='" . $data['telefono'] . "',";
        $sql .= "Email='" . $data['correo'] . "',";
        $sql .= "EmailEnvio='" . $data['correoingreso'] . "',";
        $sql .= "IdRol='" . $data['rol'] . "',";
        $sql .= "IdEstado='" . $data['estado'] . "',";
        $sql .= "Contrasena='" . $data['contrasena'] . "'";
        $sql .= " WHERE IdUsuarios=" . $data['idusuarios'] . ";";

        $r2 = $this->db->queryNoSelect($sql);

        return $r2;

        //}else{
        // return $r;
        // }

    }
    public function EditarBanco($data)
    {
        $r2 = false;
        //$r=$this->validaCorreo($data["correo"]);
        //if($r){

        $sql = "UPDATE  banco SET ";
        $sql .= "NumeroCuenta='" . $data['numeroCuenta'] . "',";
        $sql .= "NombreBanco='" . $data['nombreBanco'] . "',";
        $sql .= "NombreTitular='" . $data['nombreTitular'] . "',";
        $sql .= "Saldo='" . $data['saldo'] . "',";
        $sql .= "TipoCuenta='" . $data['tipoCuenta'] . "'";
        $sql .= " WHERE IdBanco=" . $data['idBanco'] . ";";

        $r2 = $this->db->queryNoSelect($sql);

        return $r2;

        //}else{
        // return $r;
        // }

    }
    public function borrarUsuarios($id)
    {

        $sql = "DELETE  FROM   usuarios WHERE IdUsuarios=" . $id;

        $r2 = $this->db->queryNoSelect($sql);
        return $r2;

    }
    public function borrarBanco($id)
    {

        $sql = "DELETE  FROM   banco WHERE IdBanco=" . $id;

        $r2 = $this->db->queryNoSelect($sql);
        return $r2;

    }
    public function borrarConvenio($id)
    {

        $sql = "DELETE  FROM   convenios WHERE IdConvenio=" . $id;

        $r2 = $this->db->queryNoSelect($sql);
        return $r2;

    }
    public function AgregarConvenio($data)
    {

        $sql = "INSERT INTO convenios VALUES(0,";
        $sql .= "'" . $data['NombreInstitucion'] . "',";
        $sql .= "'" . $data['Decano'] . "',";
        $sql .= "'" . $data['TextoFirmaDecano'] . "',";
        $sql .= "'" . $data['DirectorAcademico'] . "',";
        $sql .= "'" . $data['TextoFirmaDirector'] . "',";
        $sql .= "'" . $data['Logo'] . "',";
        $sql .= "'" . $data['FirmaDecano'] . "',";
        $sql .= "'" . $data['FirmaDirector'] . "',";
        $sql .= "'" . $data['Sello'] . "');";

        $r2 = $this->db->queryNoSelect($sql);

        return $r2;

    }
    
    public function obtenerNombreImagen($id){
        $sql = "SELECT Logo, FirmaDecano, FirmaDirector, Sello FROM convenios WHERE IdConvenio=".$id;
        $data = $this->db->querySelect($sql);
        return $data;
    }

    public function EditarConvenio($data)
    {
        $r2 = false;
        //$r=$this->validaCorreo($data["correo"]);
        //if($r){

            

        $sql = "UPDATE  convenios SET ";
        $sql .= "NombreInstitucion='" . $data['NombreInstitucion'] . "',";
        $sql .= "Decano='" . $data['Decano'] . "',";
        $sql .= "TextoFirmaDecano='" . $data['TextoFirmaDecano'] . "',";
        $sql .= "DirectorAcademico='" . $data['DirectorAcademico'] . "',";
        $sql .= "TextoFirmaDirector='" . $data['TextoFirmaDirector'] . "',";
        $sql .= "Logo='" . $data['Logo'] . "',";
        $sql .= "FirmaDecano='" . $data['FirmaDecano'] . "',";
        $sql .= "FirmaDirector='" . $data['FirmaDirector'] . "',";
        $sql .= "Sello='" . $data['Sello'] . "'";
        $sql .= " WHERE IdConvenio=" . $data['IdConvenio'] . ";";

        $r2 = $this->db->queryNoSelect($sql);

        return $r2;

        //}else{
        // return $r;
        // }

    }

    public function getExpositoresAdmin()
    {
        $sql = "SELECT * FROM expositores ";
        $data = $this->db->querySelect($sql);
        return $data;

    }
    public function AgregarExpositor($data)
    {

        $sql = "INSERT INTO expositores VALUES(0,";
        $sql .= "'" . $data['Dni'] . "',";
        $sql .= "'" . $data['Prefijo'] . "',";
        $sql .= "'" . $data['ApellidoPaterno'] . "',";
        $sql .= "'" . $data['ApellidoMaterno'] . "',";
        $sql .= "'" . $data['Nombre'] . "',";
        $sql .= "'" . $data['Telefono'] . "',";
        $sql .= "'" . $data['Reseña'] . "',";
        $sql .= "'" . $data['FotoPerfil'] . "');";

        $r2 = $this->db->queryNoSelect($sql);

        return $r2;

    }
    public function borrarExpositor($id)
    {

        $sql = "DELETE  FROM   expositores WHERE IdExpositores=" . $id;

        $r2 = $this->db->queryNoSelect($sql);
        return $r2;

    }
    public function obtenerNombreImagenExpositor($id){
        $sql = "SELECT FotoPerfil FROM expositores WHERE IdExpositores=".$id;
        $data = $this->db->querySelect($sql);
        return $data;
    }
    public function EditarExpositor($data)
    {
        $r2 = false;
        //$r=$this->validaCorreo($data["correo"]);
        //if($r){

            

        $sql = "UPDATE  expositores SET ";
        $sql .= "Dni='" . $data['Dni'] . "',";
        $sql .= "Prefijo='" . $data['Prefijo'] . "',";
        $sql .= "ApellidoPaterno='" . $data['ApellidoPaterno'] . "',";
        $sql .= "ApellidoMaterno='" . $data['ApellidoMaterno'] . "',";
        $sql .= "Nombre='" . $data['Nombre'] . "',";
        $sql .= "Telefono='" . $data['Telefono'] . "',";
        $sql .= "Reseña='" . $data['Reseña'] . "',";
        $sql .= "FotoPerfil='" . $data['FotoPerfil'] . "'";
        $sql .= " WHERE IdExpositores=" . $data['IdExpositor'] . ";";

        $r2 = $this->db->queryNoSelect($sql);

        return $r2;

        //}else{
        // return $r;
        // }

    }

    

}