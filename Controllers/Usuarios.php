<?php

//TODO: Hacer sistema de roles y permisos

class Usuarios extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['login']))
            header('location:' . base_url() . '/login');
        parent::__construct();
    }

    public function Usuarios()
    {
        $data = array(
            'page_tag' => 'NOE - Usuarios',
            'page_title' => 'Gestión de usuarios',
            'page_name' => 'Usuarios',
            'nav_father' => 'Administracion',
            'page_function' => 'usuarios.js'
        );
        $this->views->getView($this, 'usuarios', $data);
    }

    public function setUsuario()
    {
        if ($_POST) {
            if (empty($_POST['txtId']) || empty($_POST['txtUsuario']) || empty($_POST['listRol']) || empty($_POST['listEstado'])) {
                $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
            } else {
                $intId = intval(strClean($_POST['txtId']));
                $strUsuario = strtolower(strClean($_POST['txtUsuario']));
                $intRolId = intval(strClean($_POST['listRol']));
                $intEstado = intval(strClean($_POST['listEstado']));
                $intIdUsuario = empty($_POST['idUsuario']) ? 0 : intval(strClean($_POST['idUsuario']));

                if ($intIdUsuario == 0) {
                    $strPass = hash("SHA256", $_POST['txtPass']);
                    $request_usuario = $this->model->insertUsuario($intId, $strUsuario, $strPass, $intRolId, $intEstado);
                    $sw = true;
                } else {
                    $strPass = empty($_POST['txtPass']) ? 0 : hash("SHA256", $_POST['txtPass']);
                    $request_usuario = $this->model->updateUsuario($intIdUsuario, $intId, $strUsuario, $strPass, $intRolId, $intEstado);
                    $sw = false;
                }

                if ($request_usuario > 0) {
                    if ($sw) {
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                    } else {
                        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                    }
                } else if ($request_usuario == 0) {
                    $arrResponse = array('status' => false, 'msg' => 'La identificación o usuario ingresado ya existen.');
                } else if ($request_usuario == -1) {
                    $arrResponse = array('status' => false, 'msg' => 'La identificación ingresada no pertenece a ningún funcionario.');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Hubo un error al almacenar los datos');
                }
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function getUsuarios()
    {
        $arrData = $this->model->selectUsuarios();

        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]['estado'] == 1) {
                $arrData[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
            } else {
                $arrData[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
            }
            $arrData[$i]['numeracion'] = '';
            $arrData[$i]['acciones'] = '
            <div class="text-center">
                <button class="btn btn-info btn-sm btnViewUsuario" data-toggle="tooltip" data-placement="top" title="Ver">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-warning btn-sm btnEditUsuario" data-toggle="tooltip" data-placement="top" title="Editar">
                    <i class="fas fa-pen-to-square"></i>
                </button>
                <button class="btn btn-danger btn-sm btnDeleteUsuario" data-toggle="tooltip" data-placement="top" title="Eliminar">
                    <i class="fas fa-trash-can"></i>
                </button>
            </div>
            ';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function getUsuario($id)
    {
        $intId = intval(strClean($id));
        if ($intId > 0) {
            $arrData = $this->model->selectUsuario($intId);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrResponse = array('status' => true, 'msg' => $arrData);
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function deleteUsuario($id)
    {
        $intId = intval(strClean($id));
        if ($intId > 0) {
            $request_usuario = $this->model->deleteUsuario($intId);
            if ($request_usuario) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
?>