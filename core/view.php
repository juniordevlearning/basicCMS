<?php

class View
{
    protected $body;

    public function setBody($body)
    {
        $this->body = $body;
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

