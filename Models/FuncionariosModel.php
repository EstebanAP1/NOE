<?php

class FuncionariosModel extends MySql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectFuncionario(string $cedula)
    {
        $sql = "SELECT tipo_doc,num_doc,nombre1,nombre2,apellido1,apellido2,sexo,cargo,area,seccional,municipio,estado FROM funcionario WHERE num_doc = $cedula";
        return $this->select($sql);
    }

    public function insertFuncionario(array $data)
    {
        $sql = "INSERT INTO funcionario(tipo_doc,num_doc,nombre1,nombre2,apellido1,apellido2,sexo,cargo,area,seccional,municipio,estado) VALUES
        (?,?,?,?,?,?,?,?,?,?,?,?)";
        $arrData = array(
            $data['tipo_doc'], $data['num_doc'], $data['nombre1'], $data['nombre2'], $data['apellido1'], $data['apellido2'], $data['sexo'], $data['cargo'],
            $data['area'], $data['seccional'], $data['municipio'], $data['estado']
        );
        $this->insert($sql, $arrData);
    }

    public function updateFuncionario(array $data)
    {
        $sql = "UPDATE funcionario SET tipo_doc=?,nombre1=?,nombre2=?,apellido1=?,apellido2=?,sexo=?,cargo=?,area=?,seccional=?,municipio=?,estado=?
        WHERE num_doc=?";
        $arrData = array(
            $data['tipo_doc'], $data['nombre1'], $data['nombre2'], $data['apellido1'], $data['apellido2'], $data['sexo'], $data['cargo'],
            $data['area'], $data['seccional'], $data['municipio'], $data['estado'], $data['num_doc']
        );
        $this->update($sql, $arrData);
    }

}
?>