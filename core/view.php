<?php

class View
{
    public $pdo;
    protected $body;

    public function __construct($pdo) 
    {
        $this->pdo = $pdo;
    }

    public function direct($file)
    {
        $this->body = 'app/'.$file.'.php';
    }

    public function getBody()
    {
        return isset($this->body) ? $this->body : 'app/home.php';
    }
    
    public function render()
    {
        include 'app/layout.php';
    }
}

