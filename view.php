<?php

// INSPIRATION https://www.php.net/manual/en/language.oop5.overloading.php

class View
{
    public $templates = [];
    protected $params = [];
    public $name;
    protected $view = '';

    protected $views;

    /* ? in View::params ist festgelegt welche Parameter
    ** View sich im Kontext einer Komposit-Templates (zB Home)
    ** herauspicken soll, damit nicht immer über alle
    ** Parameter beim Rendern iteriert werden muss
    */

    // IMPROVE Constructor is voll hässlich
    function __construct($params = null, $fileName=null)
    {
        $this->name = $fileName;
        if ($fileName != null)
        {
            $this->view = $this->readFromFile($fileName);
        }

        
        if ($params != null)
        {
            $this->setParams($params);
        }

    }

    public function getView()
    {
        return $this->view;
    }
    
    // ? obsolet ?


    // TODO noch nicht in Verwendung

    protected function assignNessecaryParams($externalParams)
    {
        foreach($this->params as $param)
        {
            if (in_array($param, $externalParams))
            {
                $this->params[$param] = $externalParams[$param];
            }
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getParams()
    {
        return $this->params;
    }
    /* ? $updateView = true/false Flag
    ** damit nach Initialisierung View automatisch mit upgedateten
    ** Parametern gererendert wird
    */
    public function setParam($key, $value)
    {
        $this->params[$key] = $value;
    }

    public function setParams($params)
    {
        $this->params = $params;
    }

    public function readFromFile($templateName)

    {
        $fileName = "./templates/".$templateName.".php";
        // echo $fileName;
        return file_get_contents($fileName);
    }

     public static function renderTemplate($template, $params=null)
    {
        if ($params == null || count($params) <= 0) 
        {
            return $template;
        }
        $renderedTemplate = $template;

        foreach($params as $key=>$value)
            {
                $renderedTemplate = preg_replace("/(\{\{". $key ."\}\})/", htmlspecialchars($value), $renderedTemplate);

            }
        
        return $renderedTemplate;
    }

    public function before()
    {
        // echo "before";
    }

    public function after()
    {
        // echo "after";
    }

    public function render() 
    {
        $this->before();
        if ($this->view == "")
        {
            $rawTemplate = $this->readFromFile($this->name);
            $this->view = View::renderTemplate($rawTemplate, $this->params);
            return;
        }

        $this->view = View::renderTemplate($this->view, $this->params);
        $this->after();
        // var_dump($this->params);
        return;
    }

    public function display()
    {
        if ($this->view == "")
        {
            return 0;
        }
        echo $this->view;
        
        
        return 1;
    }

    public function displayAll()
    {
        if (count($this->views) == 0)
        {
            return 0;
        }

        foreach ($this->views as $name=>$viewObj)
        {
            $viewObj->display();
        }

        return 1;
    }
}