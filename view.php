<?php

class View
{
    public $templates = [];
    public $params = [];

    function __construct($params = null)
    {
        $this->params = $params ?? null;
        $this->render();
    }

    public static function getTemplate($templateName)
    {
        $fileName = "./templates/".$templateName.".php";
        // echo $fileName;
        return file_get_contents($fileName);
    }

     public static function renderTemplate($template, $params=null, $readFromFile=true)
    {
        // ob_start();
        $template = $readFromFile ? View::getTemplate($template) : $template;
        if ($params == null) 
        {
            echo $template;
            return;
        }
        $renderedTemplate = $template;
        /*
         preg_match("/(\{\{[a-zA-Z- _]+\}\})/", $renderedTemplate, $slots);

         for ($i=0; $i < count($slots); ++$i)
         {
             if (in_array($slots[$i], $params))
             {
                 $renderedTemplate = preg_replace($)
             }
         }
         */
        foreach($params as $key=>$value)
            {
                $renderedTemplate = preg_replace("/(\{\{". $key ."\}\})/", $value, $renderedTemplate);
                // echo $key;
            }
        echo $renderedTemplate;
        return;
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
        ob_start();

        $this->before();

        if (count($this->templates) > 0)
        {
            foreach($this->templates as $template)
            {
                return View::renderTemplate($template, $this->params);
            }
        }
        $this->after();
    }
}