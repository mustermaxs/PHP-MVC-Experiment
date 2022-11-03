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
        // echo $requestURI;

        $routingInfo = $this->router->dispatch($requestURI, $requestMethod);
        // var_dump($routingInfo);
        $mock_info = array("view"=>$routingInfo["view"], "controller"=>$routingInfo["controller"]);

        ob_start();

        View::renderTemplate("header", $mock_info);
        View::renderTemplate("body", $mock_info);
        new Navigation();
        View::renderTemplate("footer", $mock_info);

        ob_flush();
    }
}