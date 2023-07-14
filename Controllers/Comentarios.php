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

            //TODO: REALIZAR ACTUALIZACIÓN PARA INSERTAR OBSERVACIONES

            if ($beforeData['pantalla'] != $actualData['pantalla']) {
                $arrData = array(
                    'serial' => $actualData['serial'],
                    'responsable' => $actualData['asignado_por'],
                    'tipo_dispositivo' => 'Pantalla',
                    'comentario' => 'Sin observacion',
                    'serial_anterior' => $beforeData['pantalla'],
                    'serial_nuevo' => $actualData['pantalla']
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
                    'serial_nuevo' => $actualData['teclado']
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
                    'serial_nuevo' => $actualData['mouse']
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
                    'serial_nuevo' => $actualData['cargador']
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
                    'serial_nuevo' => $actualData['nombre_pc']
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
                    'serial_nuevo' => $actualData['so']
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
                    'serial_nuevo' => $actualData['num_doc']
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
                    'serial_nuevo' => $actualData['cod_seccional']
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
                    'serial_nuevo' => $actualData['cod_municipio']
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

    public function getComments()
    {
        if ($_POST) {
            $comments = $_POST;
            $html = getModal('modalComments', $comments);
        }
    }

    public function updateComments()
    {
        if ($_POST) {
            $comments = $_POST;
            $request_array = array();
            foreach ($comments as $key => $value) {
                if ($value != '') {
                    $request = $this->model->updateComment($key, $value);
                    array_push($request_array, $request);
                }
            }
            if (in_array(-1, $request_array)) {
                $arrResponse = array('status' => true, 'msg' => 'Error al insertar uno o más comentarios.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Comentarios insertados correctamente.');
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
?>