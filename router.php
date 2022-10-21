<?php

class Router
{
    public Request $request;
    protected array $routes = [];

    function __construct()
    {
        $this->request = new Request();
    }

    public function get($path, $callback)
    {
        $fullPath = "/". basename(__DIR__). $path;
        $this->routes["get"][$fullPath] = $callback;
    }
    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false)
        {
            echo "Not found";
            return;
        }
        echo call_user_func($callback);
    }
}