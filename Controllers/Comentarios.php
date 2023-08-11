<?php

class Comentarios extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function setComments()
    {
        if ($_POST) {
            $cambios = array();
            $errores = array();
            $beforeData = $_POST['beforeData'];
            $actualData = $_POST['actualData'];

            if ($beforeData['pantalla'] != $actualData['pantalla']) {
                $arrData = array(
                    'serial' => $actualData['serial'],
                    'responsable' => $actualData['asignado_por'],
                    'tipo_dispositivo' => 'Pantalla',
                    'comentario' => 'Sin observacion',
                    'serial_anterior' => $beforeData['pantalla'],
                    'serial_nuevo' => $actualData['pantalla'],
                    'estado' => $actualData['estado']
                );
                $request = $this->model->insertComment($arrData);
                if ($request > 0) {
                    $cambios['Pantalla'] = $request;
                } else {
                    $errores['Pantalla'] = $request;
                }
            }
            if ($beforeData['teclado'] != $actualData['teclado']) {
                $arrData = array(
                    'serial' => $actualData['serial'],
                    'responsable' => $actualData['asignado_por'],
                    'tipo_dispositivo' => 'Teclado',
                    'comentario' => 'Sin observacion',
                    'serial_anterior' => $beforeData['teclado'],
                    'serial_nuevo' => $actualData['teclado'],
                    'estado' => $actualData['estado']
                );
                $request = $this->model->insertComment($arrData);
                if ($request > 0) {
                    $cambios['Teclado'] = $request;
                } else {
                    $errores['Teclado'] = $request;
                }
            }
            if ($beforeData['mouse'] != $actualData['mouse']) {
                $arrData = array(
                    'serial' => $actualData['serial'],
                    'responsable' => $actualData['asignado_por'],
                    'tipo_dispositivo' => 'Mouse',
                    'comentario' => 'Sin observacion',
                    'serial_anterior' => $beforeData['mouse'],
                    'serial_nuevo' => $actualData['mouse'],
                    'estado' => $actualData['estado']
                );
                $request = $this->model->insertComment($arrData);
                if ($request > 0) {
                    $cambios['Mouse'] = $request;
                } else {
                    $errores['Mouse'] = $request;
                }
            }
            if ($beforeData['cargador'] != $actualData['cargador']) {
                $arrData = array(
                    'serial' => $actualData['serial'],
                    'responsable' => $actualData['asignado_por'],
                    'tipo_dispositivo' => 'Cargador',
                    'comentario' => 'Sin observacion',
                    'serial_anterior' => $beforeData['cargador'],
                    'serial_nuevo' => $actualData['cargador'],
                    'estado' => $actualData['estado']
                );
                $request = $this->model->insertComment($arrData);
                if ($request > 0) {
                    $cambios['Cargador'] = $request;
                } else {
                    $errores['Cargador'] = $request;
                }
            }
            if ($beforeData['nombre_pc'] != $actualData['nombre_pc']) {
                $arrData = array(
                    'serial' => $actualData['serial'],
                    'responsable' => $actualData['asignado_por'],
                    'tipo_dispositivo' => 'Nombre PC',
                    'comentario' => 'Sin observacion',
                    'serial_anterior' => $beforeData['nombre_pc'],
                    'serial_nuevo' => $actualData['nombre_pc'],
                    'estado' => $actualData['estado']
                );
                $request = $this->model->insertComment($arrData);
                if ($request > 0) {
                    $cambios['Nombre PC'] = $request;
                } else {
                    $errores['Nombre PC'] = $request;
                }
            }
            if ($beforeData['so'] != $actualData['so']) {
                $arrData = array(
                    'serial' => $actualData['serial'],
                    'responsable' => $actualData['asignado_por'],
                    'tipo_dispositivo' => 'Sistema Operativo',
                    'comentario' => 'Sin observacion',
                    'serial_anterior' => $beforeData['so'],
                    'serial_nuevo' => $actualData['so'],
                    'estado' => $actualData['estado']
                );
                $request = $this->model->insertComment($arrData);
                if ($request > 0) {
                    $cambios['S.O.'] = $request;
                } else {
                    $errores['S.O.'] = $request;
                }
            }
            if ($beforeData['num_doc'] != $actualData['num_doc']) {
                $arrData = array(
                    'serial' => $actualData['serial'],
                    'responsable' => $actualData['asignado_por'],
                    'tipo_dispositivo' => 'Funcionario',
                    'comentario' => 'Sin observacion',
                    'serial_anterior' => $beforeData['num_doc'],
                    'serial_nuevo' => $actualData['num_doc'],
                    'estado' => $actualData['estado']
                );
                $request = $this->model->insertComment($arrData);
                if ($request > 0) {
                    $cambios['Funcionario'] = $request;
                } else {
                    $errores['Funcionario'] = $request;
                }
            }
            if ($beforeData['cod_seccional'] != $actualData['cod_seccional']) {
                $arrData = array(
                    'serial' => $actualData['serial'],
                    'responsable' => $actualData['asignado_por'],
                    'tipo_dispositivo' => 'Seccional',
                    'comentario' => 'Sin observacion',
                    'serial_anterior' => $beforeData['cod_seccional'],
                    'serial_nuevo' => $actualData['cod_seccional'],
                    'estado' => $actualData['estado']
                );
                $request = $this->model->insertComment($arrData);
                if ($request > 0) {
                    $cambios['Seccional'] = $request;
                } else {
                    $errores['Seccional'] = $request;
                }
            }
            if ($beforeData['cod_municipio'] != $actualData['cod_municipio']) {
                $arrData = array(
                    'serial' => $actualData['serial'],
                    'responsable' => $actualData['asignado_por'],
                    'tipo_dispositivo' => 'Municipio',
                    'comentario' => 'Sin observacion',
                    'serial_anterior' => $beforeData['cod_municipio'],
                    'serial_nuevo' => $actualData['cod_municipio'],
                    'estado' => $actualData['estado']
                );
                $request = $this->model->insertComment($arrData);
                if ($request > 0) {
                    $cambios['Municipio'] = $request;
                } else {
                    $errores['Municipio'] = $request;
                }
            }
            $arrResponse = array(
                'status' => true,
                'serial' => $actualData['serial'],
                'cambios' => $cambios,
                'errores' => $errores,
                'msg' => 'Computador actualizado correctamente.'
            );
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function getCommentsModal()
    {
        if ($_POST) {
            $comments = $_POST;
            $html = getModal('modalComments', $comments);
        }
    }

    public function getComments($serial)
    {
        $arrData = $this->model->selectComments($serial);

        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]['tipo_dispositivo'] == 'Funcionario') {
                $arrData[$i]['serial_anterior'] = $this->model->selectFuncionario($arrData[$i]['serial_anterior'])['nom_funcionario'];
                $arrData[$i]['serial_nuevo'] = $this->model->selectFuncionario($arrData[$i]['serial_nuevo'])['nom_funcionario'];
            }
            $arrData[$i]['numeracion'] = '';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function updateComments()
    {
        if ($_POST) {
            $comments = $_POST;
            $request_array = array();
            foreach ($comments as $key => $value) {
                if ($value != '') {
                    $request = $this->model->updateComment($key, strClean($value));
                    array_push($request_array, $request);
                }
            }
            if (in_array(0, $request_array)) {
                $arrResponse = array('status' => true, 'warning' => true, 'msg' => 'Error al insertar uno o más comentarios.');
            } else {
                $arrResponse = array('status' => true, 'warning' => false, 'msg' => 'Comentarios insertados correctamente.');
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
?>