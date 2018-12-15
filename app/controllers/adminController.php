<?php

class adminController
{
    protected $view;
    
    public function __construct($view) {
        $this->view = $view;
    }

    public function index()
    {
        $this->view->setBody('admin');
    }
}