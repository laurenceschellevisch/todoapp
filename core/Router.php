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
        //makes static of router so we can bind values etc and makes file routes.php required so the functions get and post get executed
        //array will be filled after all the get and post functions are done
        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        // get => /home => controller (inserts controller where it says controller)
        // post =>
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        //same as get read that
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {

        //this directs you to the correct uri. well it prepares you to go to the correct uri
        if ($this->routes[$requestType][$uri]) {
            //checks if it exists in array
            return $this->callAction(
                //this is called the splat operator what it does is Key => value becomes callaction($key , $value) thats all it looks complicated but its simple
                ...explode('@',$this->routes[$requestType][$uri])
            );
        }
    }



    protected function  callAction($controller, $action) {

        if (! method_exists((new $controller),$action)) {
            //so it gets key value wich is request time uri and the it news up controller and calls action
            //done deal you have been redirected!
            throw new Exception('method not defined in controller');
        }

        return (new $controller)->$action();
    }
}