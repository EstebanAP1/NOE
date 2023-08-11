<?php

class Mantenimientos extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['login'])) {
            header('location:' . base_url() . '/login');
        }
        parent::__construct();
    }

    public function mantenimientos()
    {
        $data = array(
            'page_tag' => 'NOE - Mantenimientos',
            'page_title' => 'Gestión de Mantenimientos',
            'page_name' => 'Mantenimientos',
            'nav_father' => 'Equipos',
            'page_function' => 'mantenimientos.js'
        );
        $this->views->getView($this, 'mantenimientos', $data);
    }

    public function getRealizados()
    {
        $arrData = $this->model->selectRealizados();

        for ($i = 0; $i < count($arrData); $i++) {
            $arrData[$i]['numeracion'] = '';
            $arrData[$i]['acciones'] = '
                <div class="text-center">
                    <button class="btn btn-dark btn-sm btnActionMantenimiento">
                        <i class="fas fa-file"></i>
                    </button>
                </div>';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function getPendientes()
    {
        $arrData = $this->model->selectPendientes();

        for ($i = 0; $i < count($arrData); $i++) {
            $arrData[$i]['numeracion'] = '';
            $arrData[$i]['acciones'] = '
                <div class="text-center">
                    <button class="btn btn-dark btn-sm btnActionMantenimiento">
                        <i class="fas fa-file"></i>
                    </button>
                </div>';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function getActaModal()
    {
        if ($_POST) {
            $datos = $_POST;
            getModal('modalMantenimientos', $datos);
        }
    }

    public function uploadActa($serial)
    {
        $serial = strClean($serial);
        $file = $_FILES['fileMantenimiento']['name'];

        if ($file != '') {
            $datosEquipo = $this->model->selectComputador($serial);
            $datosFuncionario = $this->model->selectFuncionario($datosEquipo['num_doc']);

            if (!empty($datosEquipo) && !empty($datosFuncionario)) {
                $archivo = $_FILES['fileMantenimiento']['tmp_name'];
                $ruta = FTP_DIR . '/' . $datosFuncionario['tipo_doc'] . '_' . $datosFuncionario['num_doc'] . '_' . $datosEquipo['serial'] . '_' . date('Y-m-d_h-i-s') . '.pdf';

                $ftp_request = $this->model->uploadActa($archivo, $ruta);

                if ($ftp_request == 1) {
                    $request = $this->model->insertActa($datosEquipo, $datosFuncionario, $ruta);
                    if ($request > 0) {
                        $arrResponse = array('status' => true, 'warning' => false, 'msg' => 'Acta cargada correctamente.');
                    } else {
                        $arrResponse = array('status' => true, 'warning' => true, 'msg' => 'Acta cargada correctamente. Error al subir a BD.');
                    }
                } else if ($ftp_request == 2) {
                    $arrResponse = array('status' => false, 'msg' => 'Error al subir el acta.');
                } else if ($ftp_request == 3) {
                    $arrResponse = array('status' => false, 'msg' => 'Error al conectarse con el servidor.');
                }
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error en equipo o funcionario.');
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Archivo vacío.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function getActas($serial)
    {
        $serial = strClean($serial);

        $arrData = $this->model->selectActas($serial);

        for ($i = 0; $i < count($arrData); $i++) {
            $arrData[$i]['numeracion'] = '';

            $arrData[$i]['acciones'] = '
                <div class="text-center">
                    <button class="btn btn-warning btn-sm btnViewActa">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                ';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function viewActa($id)
    {
        $id = strClean($id);
        $route = $this->model->selectActaRoute($id);
        getModal('modalViewActa', $route);
    }

}
?>