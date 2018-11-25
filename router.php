<?php

class Router
{
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function get($route, $file)
    {
        $uri = explode("/", $this->request);
        
        if ($uri[0] == $route) {
            require $file.'.php';
        }
    }
}

