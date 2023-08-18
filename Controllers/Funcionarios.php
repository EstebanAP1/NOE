<?php

class Funcionarios extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['login'])) {
            header('location:' . base_url() . '/login');
        }
        parent::__construct();
    }

    public function funcionarios()
    {
        $data = array(
            'page_tag' => 'NOE',
            'page_title' => 'Gestión de funcionarios',
            'page_name' => 'Funcionarios',
            'nav_father' => ''
        );
        $this->views->getView($this, 'funcionarios', $data);
    }

    public function actualizarFuncionarios()
    {
        $dataFuncionario = [
            array(
                'tipo_doc' => 'CC',
                'num_doc' => '0001',
                'nombre1' => 'NUEVO',
                'nombre2' => '',
                'apellido1' => '',
                'apellido2' => '',
                'sexo' => 'M',
                'cargo' => '67',
                'area' => '5',
                'seccional' => '01',
                'municipio' => '001',
                'estado' => 'A'
            ),
            array(
                'tipo_doc' => 'CC',
                'num_doc' => '0002',
                'nombre1' => 'DISPONIBLE',
                'nombre2' => '',
                'apellido1' => '',
                'apellido2' => '',
                'sexo' => 'M',
                'cargo' => '67',
                'area' => '5',
                'seccional' => '01',
                'municipio' => '001',
                'estado' => 'A'
            ),
            array(
                'tipo_doc' => 'CC',
                'num_doc' => '0003',
                'nombre1' => 'EN GARANTIA',
                'nombre2' => '',
                'apellido1' => 'BODEGA',
                'apellido2' => '',
                'sexo' => 'M',
                'cargo' => '67',
                'area' => '5',
                'seccional' => '01',
                'municipio' => '001',
                'estado' => 'A'
            ),
            array(
                'tipo_doc' => 'CC',
                'num_doc' => '0004',
                'nombre1' => 'SIN GARANTIA',
                'nombre2' => '',
                'apellido1' => 'BODEGA',
                'apellido2' => '',
                'sexo' => 'M',
                'cargo' => '67',
                'area' => '5',
                'seccional' => '01',
                'municipio' => '001',
                'estado' => 'A'
            ),
            array(
                'tipo_doc' => 'CC',
                'num_doc' => '1140892025',
                'nombre1' => 'KEVIN',
                'nombre2' => 'JESUS',
                'apellido1' => 'ALMARIO',
                'apellido2' => 'OROZCO',
                'sexo' => 'M',
                'cargo' => '67',
                'area' => '5',
                'seccional' => '01',
                'municipio' => '001',
                'estado' => 'A'
            ),
            array(
                'tipo_doc' => 'CC',
                'num_doc' => '1001882140',
                'nombre1' => 'JESUS',
                'nombre2' => 'DAVID',
                'apellido1' => 'LOZADA',
                'apellido2' => 'AGUAS',
                'sexo' => 'M',
                'cargo' => '67',
                'area' => '5',
                'seccional' => '01',
                'municipio' => '001',
                'estado' => 'A'
            )
        ];

        //TODO: TRAER DATOS DE GÉNESIS, HACER VIEW, TABLA Y BOTON PARA ACTUALIZAR

        for ($i = 0; $i < count($dataFuncionario); $i++) {
            $cedula = $dataFuncionario[$i]['num_doc'];

            $requestNoe = $this->model->selectFuncionario($cedula);
            if (empty($requestNoe)) {
                $this->model->insertFuncionario($dataFuncionario[$i]);
            } else {
                $this->model->updateFuncionario($dataFuncionario[$i]);
            }
        }
    }
}
?>