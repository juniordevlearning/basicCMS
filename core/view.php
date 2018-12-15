<?php

class View
{
    protected $pdo;
    protected $body;

    public function __construct($pdo) 
    {
        $this->pdo = $pdo;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getBody()
    {
        return isset($this->body) ? 'app/'.$this->body.'.php' : 'app/home.php';
    }

    public function getPdo()
    {
        return $this->pdo;
    }
    
    public function render()
    {
        include 'app/layout.php';
    }
}

