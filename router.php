<?php

class Router
{
    private $routingInfo = [];
    protected array $routes = [
        "GET" => [],
        "POST" => []
    ];
    // (noch) nicht in Verwendung
    private $regexSubstitutes = [
        ":str" => "([a-zA-Z]+?)",
        ":int" => "([0-9]+?)",
        ":si" => "([a-zA-Z0-9]+?)"
    ];

    function __construct()
    {
    }

    public function get($path, $callback)
    {
        $regexPath = $this->createRegexPattern(($path));
        array_push($this->routes["GET"], $regexPath);
    }

    public function post($path, $callback)
    {
        $regexPath = $this->createRegexPattern(($path));
        array_push($this->routes["POST"], $regexPath);
    }

    private function createRegexPattern($path)
    {
        $regexPattern = preg_replace("/\//", "\\/", $path);
        $regexPattern = preg_replace('/\{([a-z]+)\}/', '(?\'\1\'[a-z-]+)', $regexPattern);
        $regexPattern = "/". $regexPattern. "/";
        // echo $regexPattern;
        return $regexPattern;
    }

    private function matchRoute($route, $method)
    {
        $this->setRoutingInfo("routeExists", false);
        echo "route: ". $route. "<br>";
        
        foreach($this->routes[$method] as $pattern)
        {
            echo "pattern: ". $pattern. "<br>";

            // TODO: 
            if (preg_match($pattern, $route, $matches))
            {
                $this->routingInfo["routeExists"] = true;
                
                foreach($matches as $key=>$value)
                {
                    var_dump($matches);
                    echo "\n". $matches["view"];
                    $this->setRoutingInfo($key, $value);
                }
            }

        }
        return $this->routingInfo;
    }
    protected function setRoutingInfo($key, $value)
    {
        $this->routingInfo[$key] = $value;
    }

    public function dispatch($route, $method)
    {
        // get query-params here?
        $this->routingInfo = $this->matchRoute($route, $method);
        return $this->routingInfo;

    }
}