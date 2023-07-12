<?php

class Login extends Controllers
{
    public function __construct()
    {
        session_start();
        if (isset($_SESSION['login'])) {
            header('location:' . base_url());
        }
        parent::__construct();
    }

    public function login()
    {
        $data = array(
            'page_tag' => 'NOE - Login',
            'page_title' => 'Inicia sesión para continuar',
            'page_name' => 'Login',
            'nav_father' => '',
            'page_function' => 'login.js'
        );
        $this->views->getView($this, 'login', $data);
    }

    public function loginUser()
    {
        if ($_POST) {
            if (empty($_POST['txtUsuario']) || empty($_POST['txtPass'])) {
                $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
            } else {
                $strUsuario = strtolower(strClean($_POST['txtUsuario']));
                $strPass = hash('SHA256', $_POST['txtPass']);

                $request = $this->model->loginUser($strUsuario, $strPass);

                if (!empty($request)) {
                    if ($request['estado'] == 1) {
                        $_SESSION['id'] = $request['id_user'];
                        $_SESSION['login'] = true;

                        $arrData = $this->model->sessionLogin($_SESSION['id']);
                        $_SESSION['userData'] = $arrData;

                        $arrResponse = array('status' => true, 'msg' => base_url());
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'Usuario inactivo, favor contacta con un administrador.');
                    }
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Usuario o contraseña incorrectos.');
                }
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function setPass()
    {
        if ($_POST) {
            if (empty($_POST['txtNewPass']) || empty($_POST['txtConfirmPass'])) {
                $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
            } else {
                $intId = intval($_SESSION['recoverData']['id_user']);
                $strPass = $_POST['txtNewPass'];
                $strConfirmPass = $_POST['txtConfirmPass'];

                if ($strPass == $strConfirmPass) {
                    $arrResponse = $this->model->getUsuario($intId);
                    if (!empty($arrResponse)) {
                        $strPass = hash('SHA256', $strPass);
                        $request = $this->model->setPassUser($intId, $strPass);

                        if ($request) {
                            $arrResponse = array(
                                'status' => true,
                                'msg' => 'Contraseña actualizada correctamente.',
                                'url' => base_url() . '/Login'
                            );
                            unset($_SESSION['recoverData']);
                        } else {
                            $arrResponse = array(
                                'status' => true,
                                'msg' => 'Hubo un error al realizar el proceso, contacta con un administrador o intenta más tarde.'
                            );
                        }
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
                    }
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Las contraseñas no coinciden.');
                }
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error en envío de datos.');
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
?>