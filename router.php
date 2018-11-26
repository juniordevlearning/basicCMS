<?php

class Router
{
    public $requestUri;
    public $requestMethod;
    protected $routes = [];
    // gets URI and request Method
    public function getRequest($request = NULL)
    {
        if ($request === NULL) {
            $request = trim($_SERVER['REQUEST_URI'], '/, .');
        }

        if (pathinfo($request, PATHINFO_EXTENSION)) {
            $request = substr($request, 0, strrpos($request, '.'));
        }
        $this->requestUri = $request; 
        $this->requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
    }
    // get all routes of request method 
    protected function getRoutes($method)
    {
        $routes = $this->routes[$method];

        return $routes;
    }
    // looking for match in request and route
    public function match()
    {
        if ($routes = $this->getRoutes($this->requestMethod)) {
            foreach ($routes as $route => $view) {
                if ($route == $this->requestUri) {
                    include($view.'.php');
                }
            }
        }
    }
    // declare get route 
    public function get($route, $file)
    {
        $this->routes['GET'][$route] = $file; 
    }
    // declare post route    
    public function post($route, $file)
    {
        $this->routes['POST'][$route] = $file; 
    }
}

