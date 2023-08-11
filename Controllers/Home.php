<?php

class Home extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['login'])) {
            header('location:' . base_url() . '/login');
        }
        parent::__construct();
    }

    public function home()
    {
        $data = array(
            'page_tag' => 'NOE',
            'page_title' => 'Inicio',
            'page_name' => 'Home',
            'nav_father' => ''
        );
        $this->views->getView($this, 'home', $data);
    }


}
?>