<?php

require_once("./view.php");


function displayArr($arr)
{
    echo "<pre>";
    var_dump($arr);
    echo "</pre>";
}

// TODO public function __construct()
	// {
	// 	parent::__construct();

class Compound extends View
{
    protected $params = [];
    protected $virtualViews = [];
    protected $views = [];
    
    function __construct($params)
    {
        if ($params != null)
        {
            $this->params = $params;
            // $this->init();

            foreach($this->views as $viewName => $viewEl)
            {
                $this->setName($viewName, $viewName);
            }
        }
    }

    public function setName($viewEl, $name)
    {
        $this->views[$viewEl]->name = $name;
    }

    protected function init()
    {

    }
    // TODO
    // protected function extractViewsFromCompound($compound)
    // {
    //     foreach($compound as $views=>)
    // }

    public function filterViews($viewObj)
    {
        if (get_class($viewObj) != "View")
        {
            return $this->filterViews(array_shift($viewObj->views));
        }

        return $viewObj;
    }

    // IMPROVE voll hässlich und unübersichtlich
        // ? bei nested-compounds -> jeder compound sollte sich selbst rendern und
        // parent-compound nur resultat (eigenes $virtualViews) returnen
    public function render()
    {
        $this->before();

        foreach($this->views as $viewObj=>$view)
        {
            if (get_class($view) != "View")
            {
                foreach($view->views as $viewCompoundEl)
                {
                    $view = $this->filterViews($viewCompoundEl);
                    $view->render();
                    array_push($this->virtualViews, $view);

                }
            }
            else
            {
                array_push($this->virtualViews, $view);
            }

            $this->virtualViews[count($this->virtualViews)-1]->render();
            
        }
        // TESTING
        // foreach($this->virtualViews as $view)
        // {
        //     // echo "<br>". "render: ". $view->name. "<br>";
        //     // echo $view->view;
        // }
        $this->after();

    }

    public function display()
    {

        foreach($this->virtualViews as $viewObj=>$view)
        {
            echo html_entity_decode($view->view);
        }
    }
}