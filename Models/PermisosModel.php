<?php

class PermisosModel extends MySql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectModulos()
    {
        $sql = "SELECT idmodulo,titulo,descripcion,estado FROM modulo WHERE estado!=0";
        return $this->selectAll($sql);
    }

    public function selectPermisosRol(int $idrol)
    {
        $sql = "SELECT idpermiso,rolid,moduloid,r,w,u,d FROM permisos WHERE rolid=$idrol";
        return $this->selectAll($sql);
    }

    public function deletePermisos(int $idrol)
    {
        $sql = "DELETE FROM permisos WHERE rolid=?";
        $arrData = array($idrol);
        return $this->delete($sql, $arrData);
    }

    public function insertPermisos(int $idrol, int $idmodulo, int $r, int $w, int $u, int $d)
    {
        $sql = "INSERT INTO permisos(rolid,moduloid,r,w,u,d) VALUES (?,?,?,?,?,?)";
        $arrData = array($idrol, $idmodulo, $r, $w, $u, $d);
        return $this->insert($sql, $arrData);
    }
}

?>