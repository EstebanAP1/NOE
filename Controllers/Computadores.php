<?php

class Computadores extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['login'])) {
            header('location:' . base_url() . '/login');
        }
        parent::__construct();
    }

    public function computadores()
    {
        $data = array(
            'page_tag' => 'NOE - PCs',
            'page_title' => 'Gestión de computadores',
            'page_name' => 'Computadores',
            'nav_father' => 'Equipos',
            'page_content' => 'Párrafoooooooooo',
            'page_function' => 'computadores.js'
        );
        $this->views->getView($this, 'computadores', $data);
    }

    public function getSelectMarcas()
    {
        $html = '';
        $arrData = $this->model->selectMarcas();
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                $html .= '<option value="' . $arrData[$i]['cod_marca'] . '">' . $arrData[$i]['nom_marca'] . '</option>';
            }
        }
        echo $html;
    }

    public function getSelectProcesadores()
    {
        $html = '';
        $arrData = $this->model->selectProcesadores();
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                $html .= '<option value="' . $arrData[$i]['nom_procesador'] . '">' . $arrData[$i]['nom_procesador'] . '</option>';
            }
        }
        echo $html;
    }

    public function getSelectDiscos()
    {
        $html = '';
        $arrData = $this->model->selectDiscos();
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                $html .= '<option value="' . $arrData[$i]['nom_disco'] . '">' . $arrData[$i]['nom_disco'] . '</option>';
            }
        }
        echo $html;
    }

    public function getSelectRam()
    {
        $html = '';
        $arrData = $this->model->selectRam();
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                $html .= '<option value="' . $arrData[$i]['nom_ram'] . '">' . $arrData[$i]['nom_ram'] . '</option>';
            }
        }
        echo $html;
    }

    public function getSelectModelos(int $cod_marca)
    {
        $html = '';
        $arrData = $this->model->selectModelos($cod_marca);
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                $html .= '<option value="' . $arrData[$i]['cod_modelo'] . '" selected>' . $arrData[$i]['nom_modelo'] . '</option>';
            }
        }
        echo $html;
    }

    public function setComputador()
    {
        if ($_POST) {
            if (
                empty($_POST['txtSerial']) || empty($_POST['txtPantalla']) || empty($_POST['txtTeclado']) || empty($_POST['txtMouse']) ||
                empty($_POST['txtCargador']) || empty($_POST['txtNombrePC']) || empty($_POST['listSO']) || empty($_POST['txtEstado']) ||
                empty($_POST['listSeccional']) || empty($_POST['listMunicipio']) || empty($_POST['listFuncionario'])
            ) {
                $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos, campo de formulario vacío.');
            } else {
                $datos = array(
                    'accion' => strClean($_POST['accion']),
                    'tipo' => isset($_POST['listTipo']) ? strClean($_POST['listTipo']) : '',
                    'cod_marca' => isset($_POST['listMarca']) ? strClean($_POST['listMarca']) : '',
                    'cod_modelo' => isset($_POST['listModelo']) ? strClean($_POST['listModelo']) : '',
                    'procesador' => isset($_POST['listCPU']) ? strClean($_POST['listCPU']) : '',
                    'disco' => isset($_POST['listDisco']) ? strClean($_POST['listDisco']) : '',
                    'ram' => isset($_POST['listRAM']) ? strClean($_POST['listRAM']) : '',
                    'procedencia' => isset($_POST['listProcedencia']) ? strClean($_POST['listProcedencia']) : '',
                    'serial' => strClean($_POST['txtSerial']),
                    'serialTIC' => empty($_POST['txtSerialTIC']) ? 'N/A' : strClean($_POST['txtSerialTIC']),
                    'pantalla' => strClean($_POST['txtPantalla']),
                    'pantallaTIC' => empty($_POST['txtPantallaTIC']) ? 'N/A' : strClean($_POST['txtPantallaTIC']),
                    'teclado' => strClean($_POST['txtTeclado']),
                    'tecladoTIC' => empty($_POST['txtTecladoTIC']) ? 'N/A' : strClean($_POST['txtTecladoTIC']),
                    'mouse' => strClean($_POST['txtMouse']),
                    'mouseTIC' => empty($_POST['txtMouseTIC']) ? 'N/A' : strClean($_POST['txtMouseTIC']),
                    'cargador' => strClean($_POST['txtCargador']),
                    'cargadorTIC' => empty($_POST['txtCargadorTIC']) ? 'N/A' : strClean($_POST['txtCargadorTIC']),
                    'nom_pc' => strClean($_POST['txtNombrePC']),
                    'so' => strClean($_POST['listSO']),
                    'estado' => strClean($_POST['txtEstado']),
                    'seccional' => strClean($_POST['listSeccional']),
                    'municipio' => strClean($_POST['listMunicipio']),
                    'cod_funcionario' => strClean($_POST['listFuncionario']),
                    'asignado_por' => $_SESSION['userData']['id_user']
                );

                $datos['bateria'] = $datos['tipo'] == 'PORTATIL' ? 'INTEGRADA' : 'N/A';

                if ($datos['accion'] == 'crear') {
                    $request = $this->model->insertComputador($datos);
                } else if ($datos['accion'] == 'editar') {
                    $request = $this->model->updateComputador($datos);
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error en campo de accion.');
                }

                if ($request >= 0) {
                    if ($datos['accion'] == 'crear') {
                        $arrResponse = array('status' => true, 'msg' => 'Computador agregado correctamente.');
                    } else if ($datos['accion'] == 'editar') {
                        $arrResponse = array(
                            'status' => true,
                            'msg' => 'Computador actualizado correctamente.',
                            'beforeData' => $_SESSION['setComments'],
                            'actualData' => $this->model->selectComputador($datos['serial'])
                        );
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'Error en campo de accion.');
                    }
                } else if ($request == -1) {
                    $arrResponse = array('status' => false, 'msg' => 'El serial o nombre de equipo ingresados ya existen.');
                } else if ($request == -2) {
                    $arrResponse = array('status' => false, 'msg' => 'El serial solicitado no existe.');
                } else if ($request == -3) {
                    $arrResponse = array('status' => false, 'msg' => 'Error con: funcionario, area y cargo.');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
                }
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function getComputadores()
    {
        $arrData = $this->model->selectComputadores();

        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]["estado"] == 'Disponible') {
                $arrData[$i]["estado"] = '<span class="badge badge-info">Disponible</span>';
            } else if ($arrData[$i]['estado'] == 'Pendiente') {
                $arrData[$i]["estado"] = '<span class="badge badge-warning">Pendiente</span>';
            } else if ($arrData[$i]['estado'] == 'Bodega') {
                $arrData[$i]["estado"] = '<span class="badge badge-dark">Bogeda</span>';
            } else if ($arrData[$i]['estado'] == 'Entregado') {
                $arrData[$i]["estado"] = '<span class="badge badge-success">Entregado</span>';
            }
            $arrData[$i]['numeracion'] = '';
            $arrData[$i]['acciones'] = '
            <div class="text-center">
            <button class="btn btn-info btn-sm btnViewPC">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-warning btn-sm btnEditPC">
                    <i class="fas fa-pen-to-square"></i>
                </button>
            </div>
            
            ';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function getComputador($serial)
    {
        $strSerial = strClean($serial);
        if ($strSerial != '') {
            $arrData = $this->model->selectComputador($strSerial);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            } else {
                $_SESSION['setComments'] = $arrData;
                $arrResponse = array('status' => true, 'msg' => $arrData);
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    // TODO: COLOCAR EN OTRO CONTROLLER EN EL FUTURO 

    public function getSelectSeccionales()
    {
        $html = '';
        $arrData = $this->model->selectSeccionales();
        print_r($arrData);
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                $html .= '<option value="' . $arrData[$i]['cod_seccional'] . '">' . $arrData[$i]['nom_seccional'] . '</option>';
            }
        }
        echo $html;
    }

    public function getSelectMunicipios(string $cod_seccional)
    {
        $html = '';
        $arrData = $this->model->selectMunicipios($cod_seccional);
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                $html .= '<option value="' . $arrData[$i]['cod_municipio'] . '">' . $arrData[$i]['nom_municipio'] . '</option>';
            }
        }
        echo $html;
    }

    public function getSelectFuncionarios()
    {
        $html = '';
        $arrData = $this->model->selectFuncionarios();
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                $html .= '<option value="' . $arrData[$i]['num_doc'] . '">' . $arrData[$i]['nom_funcionario'] . '</option>';
            }
        }
        echo $html;
    }

    public function getFuncionario(string $id)
    {
        $strId = strClean($id);
        if ($strId != '') {
            $arrData = $this->model->selectFuncionario($strId);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Error de datos en funcionario.');
            } else {
                $arrResponse = array('status' => true, 'msg' => $arrData);
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error de datos en funcionario.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
?>