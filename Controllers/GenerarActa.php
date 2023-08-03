<?php

class GenerarActa extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['login'])) {
            header('location:' . base_url() . '/login');
        } else if (empty($_SESSION['datosActa'])) {
            header('location:' . base_url());
        }
        parent::__construct();
    }

    public function generarActa()
    {
        $data = $_SESSION['datosActa'];
        $this->views->getView($this, 'templateActa', $data);
    }


}
?>