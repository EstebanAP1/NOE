<?php

class ComentariosModel extends MySql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertComment(array $datos)
    {
        $sql = "SELECT serial FROM equipo WHERE serial = '{$datos['serial']}'";
        $request = $this->select($sql);

        if (!empty($request)) {
            $sql_insert = "INSERT INTO comentarios(serial_equipo,responsable,tipo_dispositivo,comentario,serial_anterior,serial_nuevo)
            VALUES (?,?,?,?,?,?)";
            $arrData = array(
                $datos['serial'], $datos['responsable'], $datos['tipo_dispositivo'], $datos['comentario'], $datos['serial_anterior'], $datos['serial_nuevo']
            );
            return $this->insert($sql_insert, $arrData);
        } else {
            return 0;
        }
    }

    public function updateComment(int $id, string $comentario)
    {
        $sql = "SELECT id_comentario FROM comentarios WHERE id_comentario = $id";
        $request = $this->select($sql);

        if (!empty($request)) {
            $sql = "UPDATE comentarios SET comentario = ? WHERE id_comentario = ?";
            $arrData = array($comentario, $id);
            return $this->insert($sql, $arrData);
        } else {
            return -1;
        }
    }

    public function selectComments(string $serial)
    {
        $sql = "SELECT c.serial_equipo,u.username,c.tipo_dispositivo,c.comentario,c.serial_anterior,c.serial_nuevo,c.fecha FROM comentarios c
        INNER JOIN usuario u ON c.responsable = u.id_user 
        WHERE c.serial_equipo = '{$serial}'";
        return $this->selectAll($sql);
    }
}
?>