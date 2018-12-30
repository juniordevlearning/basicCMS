<?php

class Router
{
    public $requestUri;
    public $requestMethod;
    public $routes = [];

    // gets URI and request Method
    // TODO: break this method down in two methods
    public function getRequest($request = NULL)
    {
        if ($request === NULL) {
            $request = trim($_SERVER['REQUEST_URI'], '/, .');
        }
        // TODO: break down what this does
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
            foreach ($routes as $route => $destination) {
                if ($route == $this->requestUri) {
                    $this->resolve($destination);
                }
            }
        }
    }
    // TODO: when no @ in destination, allways resolve index method
    protected function resolve($destination)
    {

        list($controller, $action) = explode('@', $destination);

        $this->direct($controller, $action);
    }
    protected function direct($controller, $action)
    {
        $file = include(__DIR__."/../app/controllers/{$controller}.php");
        $obj = new $controller;

        $obj->$action();
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

