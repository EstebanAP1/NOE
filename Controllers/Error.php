<?php

class Errors extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function notFound()
    {
        // $this->views->getView($this, "error");
        header('location:' . base_url());
    }
}

$notFound = new Errors();
$notFound->notFound();
?>