<?php

class RolesModel extends MySql
{

    public function __construct()
    {
        parent::__construct();
    }

    public function selectRoles()
    {
        $sql = "SELECT idrol,nombrerol,descripcion,estado FROM rol WHERE estado!=0";
        return $this->selectAll($sql);
    }

    public function selectRol($id)
    {
        $sql = "SELECT idrol,nombrerol,descripcion,estado FROM rol WHERE idrol=$id";
        return $this->select($sql);
    }

    public function insertRol(string $rol, string $descripcion, int $estado)
    {
        $return = "";
        $sql = "SELECT idrol FROM rol WHERE nombrerol='$rol'";
        $request = $this->select($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO rol(nombrerol,descripcion,estado) VALUES(?,?,?)";
            $arrData = array($rol, $descripcion, $estado);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }

        return $return;
    }

    public function updateRol(int $id, string $rol, string $descripcion, int $estado)
    {
        $return = "";
        $sql = "SELECT idrol FROM rol WHERE idrol=$id";
        $request = $this->select($sql);

        if (!empty($request)) {
            $query_update = "UPDATE rol SET nombrerol=?, descripcion=?,estado=? WHERE idrol=?";
            $arrData = array($rol, $descripcion, $estado, $id);
            $request_update = $this->update($query_update, $arrData);
            $return = $request_update;
        } else {
            $return = 'notExist';
        }

        return $return;
    }

    public function deleteRol(int $id)
    {
        $return = "";
        $sql = "SELECT u.rolid FROM rol r INNER JOIN usuario u ON u.rolid=r.idrol WHERE r.idrol=$id";
        $request = $this->select($sql);

        if (empty($request)) {
            $query_delete = "UPDATE rol SET estado=? WHERE idrol=?";
            $arrData = array(0, $id);
            $request_delete = $this->delete($query_delete, $arrData);
            return $request_delete;
        } else {
            return 0;
        }
    }
}
?>