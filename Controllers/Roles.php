<?php
class Roles extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['login']))
            header('location:' . base_url() . '/login');
        parent::__construct();
    }

    public function roles()
    {
        $data = array(
            'page_tag' => 'NOE - Roles',
            'page_title' => 'Gestión de roles',
            'page_name' => 'Roles',
            'nav_father' => 'Administracion',
            'page_function' => 'roles.js'
        );
        $this->views->getView($this, 'roles', $data);
    }

    public function getRoles()
    {
        $arrData = $this->model->selectRoles();

        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]["estado"] == 1) {
                $arrData[$i]["estado"] = '<span class="badge badge-success">Activo</span>';
            } else {
                $arrData[$i]["estado"] = '<span class="badge badge-danger">Inactivo</span>';
            }
            $arrData[$i]['acciones'] = '
            <div class="text-center">
                <button class="btn btn-dark btnPermisosRol" data-toggle="tooltip" data-placement="top" title="Permisos">
                    <i class="fas fa-key"></i>
                </button>
                <button class="btn btn-warning btnEditRol" data-toggle="tooltip" data-placement="top" title="Editar">
                    <i class="fas fa-pen-to-square"></i>
                </button>
                <button class="btn btn-danger btnDeleteRol" data-toggle="tooltip" data-placement="top" title="Eliminar">
                    <i class="fas fa-trash-can"></i>
                </button>
            </div>
            
            ';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function getSelectRoles()
    {
        $html = "";
        $arrData = $this->model->selectRoles();
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                if ($arrData[$i]['estado'] == 1) {
                    $html .= '<option value="' . $arrData[$i]['idrol'] . '">' . $arrData[$i]['nombrerol'] . '</option>';
                }
            }
        }
        echo $html;
    }

    public function getRol($idrol)
    {
        $intIdrol = intval(strClean($idrol));
        if ($intIdrol > 0) {
            $arrData = $this->model->selectRol($intIdrol);
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

    public function setRol()
    {
        if ($_POST) {
            if (empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['listEstado'])) {
                $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
            } else {
                $intIdrol = empty($_POST['idRol']) ? 0 : intval(strClean($_POST['idRol']));
                $strRol = strClean($_POST['txtNombre']);
                $strDescripcion = strClean($_POST['txtDescripcion']);
                $intEstado = intval(strClean($_POST['listEstado']));

                if ($intIdrol == 0) {
                    //Crear
                    $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intEstado);
                    $sw = true;
                } else {
                    //Actualizar
                    $request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescripcion, $intEstado);
                    $sw = false;
                }

                if ($request_rol > 0) {
                    if ($sw) {
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');
                    } else {
                        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
                    }
                } else if ($request_rol == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => 'Error! El rol ya existe');
                } else if ($request_rol == 'notExist') {
                    $arrResposne = array('status' => false, 'msg' => 'Error! El rol no existe');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error! No es posible almacenar o modificar datos');
                }
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function deleteRol($idrol)
    {
        $intIdrol = intval(strClean($idrol));
        if ($intIdrol > 0) {
            $request_rol = $this->model->deleteRol($idrol);
            if ($request_rol) {
                $arrResponse = array('status' => true, 'msg' => 'Rol eliminado correctamente');
            } else if ($request_rol == 0) {
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un rol asignado a un usuario');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
?>