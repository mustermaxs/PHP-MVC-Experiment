<?php
require_once "./router.php";
require_once "./view.php";
require_once "./navigation.php";
// require_once "./request.php";


class Application
{
    public Router $router;

    function __construct()
    {
        $this->router = new Router();
    }

    protected function loadController($controllerName)
    {
        $controller = new $controllerName();
        $controller->run();
    }

    public function run()
    {
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $requestURI = $_SERVER["REQUEST_URI"];

        $routingInfo = $this->router->dispatch($requestURI, $requestMethod);
        var_dump($routingInfo);
        if ($routingInfo["main"] == "main")
        {
            $mock_info = array("content"=>"content", "body"=>"<h1>MAIN</h1>");
        }
        else
        {
            $mock_info = array("content"=>"content", "body"=>"<h1>LOGIN</h1>");
        }
        // echo View::renderTemplate("header");
        // echo View::renderTemplate("body", $mock_info);
        // $nav = new Navigation();
        // echo View::renderTemplate("footer");

        ob_flush();
        // if ($routingInfo["view"] == "main")
        // {
        //     echo "MATCH!!!";
        // }
        // var_dump($routingInfo);
        // $controller = new $routingInfo["controller"]($routingInfo);

    }
}