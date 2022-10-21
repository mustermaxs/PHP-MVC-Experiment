<?php
require_once "./router.php";
require_once "./request.php";


class Application
{
    public Router $router;
    public Request $request;

    function __construct()
    {
        $this->router = new Router();
        $this->request = new Request();
    }
    public function run()
    {
        $this->router->resolve();
    }
}