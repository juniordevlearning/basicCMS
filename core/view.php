<?php

class View
{
    protected $body;
    public $vars = [];

    public function setBody($body, $vars = [])
    {
        $this->body = $body;
        $this->vars = $vars;
    }

    public function getBody()
    {
        return isset($this->body) ? 'app/'.$this->body.'.php' : 'app/home.php';
    }
    
    public function render()
    {
        include 'app/layout.php';
    }
}

