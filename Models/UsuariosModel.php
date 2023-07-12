<?php

class UsuariosModel extends MySql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertUsuario(int $id, string $username, string $pass, int $rol, int $estado)
    {
        $sql = "SELECT id_user FROM usuario WHERE username = '{$username}' OR id_user = $id";
        $request_usuario = $this->select($sql);

        $sql_funcionario = "SELECT num_doc FROM funcionario WHERE num_doc = $id";
        $request_funcionario = $this->select($sql_funcionario);

        if (empty($request_usuario)) {
            if (!empty($request_funcionario)) {
                $sql_insert = "INSERT INTO usuario(id_user,username,pass,rolid,estado) VALUES (?,?,?,?,?)";
                $arrData = array($id, $username, $pass, $rol, $estado);
                return $this->insert($sql_insert, $arrData);
            } else {
                return -1;
            }
        } else {
            return 0;
        }
    }

    public function updateUsuario(int $id, int $id_user, string $username, string $pass, int $rol, int $estado)
    {
        $sql = "SELECT id_user FROM usuario WHERE (username = '{$username}' AND id != $id) OR (id_user = $id_user AND id != $id)";
        $request = $this->select($sql);

        if (empty($request)) {
            if ($pass != 0) {
                $sql_update = "UPDATE usuario SET username=?,pass=?,rolid=?,estado=? WHERE id=?";
                $arrData = array($username, $pass, $rol, $estado, $id);
            } else {
                $sql_update = "UPDATE usuario SET username=?,rolid=?,estado=? WHERE id=?";
                $arrData = array($username, $rol, $estado, $id);
            }
            return $this->update($sql_update, $arrData);
        } else {
            return 0;
        }
    }

    public function selectUsuarios()
    {
        $sql = "SELECT u.id_user,u.username,CONCAT(f.nombre1,' ',f.nombre2,' ',f.apellido1,' ',f.apellido2) AS 'nombres',r.nombrerol,u.estado FROM usuario u
        INNER JOIN funcionario f ON f.num_doc = id_user
        INNER JOIN rol r ON u.rolid = r.idrol
        WHERE u.estado != 0";
        return $this->selectAll($sql);
    }

    public function selectUsuario($id)
    {
        $sql = "SELECT u.id, u.id_user,u.username,CONCAT(f.nombre1,' ',f.nombre2,' ',f.apellido1,' ',f.apellido2) AS 'nombres',r.nombrerol,r.idrol,u.estado,u.datecreated,u.dateupdated FROM usuario u
        INNER JOIN funcionario f ON f.num_doc = id_user
        INNER JOIN rol r ON u.rolid = r.idrol
        WHERE u.id_user = $id";
        return $this->select($sql);
    }

    public function deleteUsuario($id)
    {
        $sql = "UPDATE usuario SET estado=? WHERE id_user=?";
        $arrData = array(0, $id);
        return $this->delete($sql, $arrData);
    }
}
?>