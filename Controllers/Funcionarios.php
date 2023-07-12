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
            'nav_father' => '',
        );
        $this->views->getView($this, 'funcionarios', $data);
    }
}
?>