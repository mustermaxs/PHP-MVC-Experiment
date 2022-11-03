<?php

require_once("./view.php");

abstract class Compound extends View
{
    protected $params = [];
    
    function __construct($params = null)
    {
        /* EXAMPLE USE:
        $this->views = 
        [
            "header" => new View($params, "header"),
            "body" => new View($params, "body"),
            "footer" => new View($params, "footer")
        ]; 
        */
        // $this->params = $params;
    }

    public function render()
    {
        foreach($this->views as $viewObj=>$view)
        {
            $view->render();
        }
    }

    public function display()
    {
        foreach($this->views as $viewObj=>$view)
        {
            echo $view->view;
        }
    }
}