<?php

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {

        if ($this->routes[$requestType][$uri]) {
            return $this->callAction(
                ...explode('@',$this->routes[$requestType][$uri])
            );
        }

        throw new Exception('No route defined for this URI.');
    }

    protected function  callAction($controller, $action) {

        if (! method_exists((new $controller),$action)) {
            throw new Exception('method not defined in controller');
        }

        return (new $controller)->$action();
    }
}