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


}
?>