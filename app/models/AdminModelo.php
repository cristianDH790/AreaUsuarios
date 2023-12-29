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

    public function obtenerNombreImagen($id)
    {
        $sql = "SELECT Logo, FirmaDecano, FirmaDirector, Sello FROM convenios WHERE IdConvenio=" . $id;
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
    public function obtenerNombreImagenExpositor($id)
    {
        $sql = "SELECT FotoPerfil FROM expositores WHERE IdExpositores=" . $id;
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
    public function getFirmasAdmin()
    {
        $sql = "SELECT * FROM firmas ";
        $data = $this->db->querySelect($sql);
        return $data;

    }
    public function AgregarFirma($data)
    {

        $sql = "INSERT INTO firmas VALUES(0,";
        $sql .= "'" . $data['Alias'] . "',";
        $sql .= "'" . $data['Texto1'] . "',";
        $sql .= "'" . $data['Texto2'] . "',";
        $sql .= "'" . $data['ImagenFirma'] . "',";
        $sql .= "'" . $data['ImagenSello'] . "');";

        $r2 = $this->db->queryNoSelect($sql);

        return $r2;

    }
    public function obtenerNombreImagenesFirma($id)
    {
        $sql = "SELECT ImagenFirma , ImagenSello FROM firmas WHERE IdDirectorioFirmas=" . $id;
        $data = $this->db->querySelect($sql);
        return $data;
    }
    public function borrarFirma($id)
    {

        $sql = "DELETE  FROM   firmas WHERE IdDirectorioFirmas=" . $id;

        $r2 = $this->db->queryNoSelect($sql);
        return $r2;

    }
    public function EditarFirma($data)
    {
        $r2 = false;
        //$r=$this->validaCorreo($data["correo"]);
        //if($r){

        $sql = "UPDATE  firmas SET ";
        $sql .= "Alias='" . $data['Alias'] . "',";
        $sql .= "Texto1='" . $data['Texto1'] . "',";
        $sql .= "Texto2='" . $data['Texto2'] . "',";
        $sql .= "ImagenFirma='" . $data['ImagenFirma'] . "',";
        $sql .= "ImagenSello='" . $data['ImagenSello'] . "'";
        $sql .= " WHERE IdDirectorioFirmas	=" . $data['IdDirectorioFirmas'] . ";";

        $r2 = $this->db->queryNoSelect($sql);

        return $r2;

        //}else{
        // return $r;
        // }

    }
    public function getProductosAdmin()
    {
        $sql = "SELECT * FROM producto ";
        $data = $this->db->querySelect($sql);
        return $data;

    }
    public function AgregarProductos($data)
    {

        $sql = "INSERT INTO producto VALUES(0,";
        $sql .= "'" . $data['NombreProducto'] . "',";
        $sql .= "'" . $data['Dominio'] . "',";

        $sql .= "'" . $data['Descripcion'] . "');";

        $r2 = $this->db->queryNoSelect($sql);

        return $r2;

    }
    public function borrarProductos($id)
    {

        $sql = "DELETE  FROM   producto WHERE IdProducto=" . $id;

        $r2 = $this->db->queryNoSelect($sql);
        return $r2;

    }
    public function EditarProducto($data)
    {
        
        //$r=$this->validaCorreo($data["correo"]);
        //if($r){

        $sql = "UPDATE  producto SET ";
        $sql .= "NombreProducto='" . $data['NombreProducto'] . "', ";
        $sql .= "Dominio='" . $data['Dominio'] . "', ";
        $sql .= "Descripcion='" . $data['Descripcion'] . "' ";
        
        $sql .= " WHERE IdProducto=" . $data['IdProducto'] . ";";

        $r2 = $this->db->queryNoSelect($sql);

        return $sql;

        //}else{
        // return $r;
        // }

    }
    public function getServiciosAdmin()
    {
        $sql = "SELECT * FROM servicios ";
        $data = $this->db->querySelect($sql);
        return $data;

    }
    public function getExpositoresServicioAdmin()
    {
        $sql = "SELECT * FROM expositoresservicio ";
        $data = $this->db->querySelect($sql);
        return $data;
    }
    public function getTiposCursosAdmin()
    {
        $sql = "SELECT * FROM tiposdeservicios ";
        $data = $this->db->querySelect($sql);
        return $data;
    }
    public function getProductosServiciosAdmin()
    {
        $sql = "SELECT * FROM producto ";
        $data = $this->db->querySelect($sql);
        return $data;
    }
    public function getConveniosServiciosAdmin()
    {
        $sql = "SELECT * FROM convenios ";
        $data = $this->db->querySelect($sql);
        return $data;
    }
    public function getExpositoresServiciosAdmin()
    {
        $sql = "SELECT * FROM expositores ";
        $data = $this->db->querySelect($sql);
        return $data;
    }
    public function AgregarServicios($data)
    {
        $sql = "INSERT INTO servicios VALUES(0,";
        $sql .= "'" . $data['NumeroMayor'] . "',";
        $sql .= "'" . $data['NombreServicio'] . "',";
        $sql .= "'" . $data['Año'] . "',";
        $sql .= "'" . $data['Precio'] . "',";
        $sql .= "'" . $data['FechaInicio'] . "',";
        $sql .= "'" . $data['FechaFin'] . "',";
        $sql .= "'" . $data['Examen'] . "',";
        $sql .= "'" . $data['Hora'] . "',";
        $sql .= "'" . $data['TipoHora'] . "',";
        $sql .= "'" . $data['Tipo'] . "',";
        $sql .= "'" . $data['FechaExamen'] . "',";
        $sql .= "'" . $data['Certificado'] . "',";
        $sql .= "'" . $data['Convenio'] . "',";
        $sql .= "'" . $data['Producto'] . "',";
        $sql .= "'" . $data['Expositores'] . "',";
        $sql .= "'" . $data['CertificadoFrontal'] . "',";
        $sql .= "'" . $data['CertificadoReverso'] . "',";
        $sql .= "'" . $data['Banner'] . "',";
        $sql .= "'" . $data['TituloDescripcion'] . "',";
        $sql .= "'" . $data['Descripcion'] . "',";
        $sql .= "'" . $data['Inversion'] . "');";

        $r2 = $this->db->queryNoSelect($sql);

        return $r2;

    }
    public function getNumeroMayorServicios()
    {
        $sql = "SELECT MAX(IdNumeroServicio) AS numero_mayor FROM servicios;";
        $data = $this->db->querySelect($sql);
        return $data;
    }
    public function AgregarExpositoresServicios($dataExpositores)
    {
        $sql = "INSERT INTO expositoresservicio VALUES(0,";
        $sql .= "'" . $dataExpositores['Id'] . "',"; 
        $sql .= "'" . $dataExpositores['Expositores'] . "');";

        $r2 = $this->db->queryNoSelect($sql);

        return $r2;

    }
    public function borrarServicios($id)
    {

        $sql = "DELETE  FROM   servicios WHERE IdServicio=" . $id;

        $r2 = $this->db->queryNoSelect($sql);
        return $r2;

    }
    public function borrarExpositiresServicios($id)
    {

        $sql = "DELETE  FROM   expositoresservicio WHERE IdExpositoresServicio=" . $id;

        $r2 = $this->db->queryNoSelect($sql);
        return $r2;

    }
    public function obtenerNombreImagenesServicios($id)
    {
        $sql = "SELECT CertificadoFrontal , CertificadoReverso , Banner  FROM servicios WHERE IdServicio=" . $id;
        $data = $this->db->querySelect($sql);
        return $data;
    }
    
    
    
    
    

}