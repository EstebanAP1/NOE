<?php

class LoginModel extends MySql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loginUser(string $usuario, string $pass)
    {
        $sql = "SELECT id_user,estado FROM usuario WHERE username = '{$usuario}' AND pass = '{$pass}' AND estado != 0";
        return $this->select($sql);
    }

    public function sessionLogin(int $id)
    {
        $sql = "SELECT u.id_user,u.username,r.nombrerol,u.estado,DATE_FORMAT(u.datecreated, '%d-%m-%y') as 'fechaCreacion', DATE_FORMAT(u.dateupdated, '%d-%m-%y') as 'ultimaActu', CONCAT(f.nombre1, ' ', f.nombre2, ' ', apellido1, ' ', apellido2) as 'nombres' FROM usuario u
        INNER JOIN rol r ON u.rolid = r.idrol
        INNER JOIN funcionario f ON u.id_user = f.num_doc
        WHERE u.id_user = $id";
        return $this->select($sql);
    }

    public function getUsuario(int $intId)
    {
        $sql = "SELECT id_user FROM usuario WHERE id_user = '{$intId}' AND estado = 1";
        return $this->select($sql);
    }

    public function setPassUser(int $id, string $pass)
    {
        $sql = "UPDATE usuario SET pass = ? WHERE id_user = ?";
        $arrData = array($pass, $id);
        return $this->update($sql, $arrData);
    }
}

?>