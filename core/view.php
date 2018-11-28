<?php

class View
{
    public $pdo;
    public $body;

    public function __construct($pdo) 
    {
        $this->pdo = $pdo;
    }

    public function direct($file)
    {
        $this->body = 'app/'.$file.'.php';
    }
    
    public function render()
    {
        include 'app/layout.php';
    }
}

