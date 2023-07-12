<?php
class MySql extends Conexion
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function insert(string $query, array $arrayValues)
    {
        $insert = $this->conexion->prepare($query);
        $resInsert = $insert->execute($arrayValues);
        if ($resInsert) {
            $lastInsert = $this->conexion->lastInsertId();
        } else {
            $lastInsert = 0;
        }
        return $lastInsert;
    }

    public function select(string $query)
    {
        $result = $this->conexion->prepare($query);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function selectAll(string $query)
    {
        $result = $this->conexion->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(string $query, array $arrayValues)
    {
        $update = $this->conexion->prepare($query);
        return $update->execute($arrayValues);
    }

    public function delete(string $query, array $arrayValues)
    {
        $result = $this->conexion->prepare($query);
        return $result->execute($arrayValues);
    }
}
?>