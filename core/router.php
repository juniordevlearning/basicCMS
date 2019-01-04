<?php

class Router
{
    public $routes = [];
    public $property;
    /**
     * Returns request method, if no method is requested return Get
     *
     * @return String requestMethod
     */
    protected function getRequestMethod() : String
    {
        return isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
    }
    /**
     * Returns request URI
     *
     * @return void
     */
    protected function getRequestUri() : String
    {
        $request = trim($_SERVER['REQUEST_URI'], '/, .');
        // cut off file extension like .php .html etc
        if (pathinfo($request, PATHINFO_EXTENSION)) {
            $request = substr($request, 0, strrpos($request, '.'));
        }

        return !empty($request) ? $request : 'default'; 
    }
    /**
     * get all routes of requested method 
     *
     * @param String $method
     * @return Array $routes;
     */
    protected function getRoutes(String $method) : Array
    {
        $routes = $this->routes[$method];

        return $routes;
    }
    /**
     * looking for match in request and route
     */
    // TODO: Change $this->getRoutes() so that it only gets called once in the beginning and not with every request
    public function match()
    {
        if ($routes = $this->getRoutes($this->getRequestMethod())) {
            foreach ($routes as $route => $destination) {
                if ($route == $this->getRequestUri()) {
                    $this->resolve($destination);
                }
            }
        }
    }
    // TODO: extra would be: if only controller is given then resolve index method of given controller
    /**
     * takes the given destination of the route 
     * and seperates controller and action
     * if no @ in string then use default view, which is home
     * 
     * @param String $destination
     */
    protected function resolve(String $destination)
    {
        list($controller, $action) = explode('@', $destination);

        $this->direct($controller, $action);       
    }
    /**
     * Directs which method of controller will be used
     *
     * @param String $controller
     * @param String $action
     */
    protected function direct(String $controller, String $action)
    {
        $file = include(__DIR__."/../app/controllers/{$controller}.php");
        $obj = new $controller;

        $obj->$action();
    }
    /**
     * Declare GET routes
     *
     * @param String $route
     * @param String $file
     */
    public function get(String $route, String $file)
    {
        $this->routes['GET'][$route] = $file; 
    }
    /**
     * Declare POST routes
     *
     * @param String $route
     * @param String $file
     */
    public function post(String $route, String $file)
    {
        $this->routes['POST'][$route] = $file; 
    }
}

