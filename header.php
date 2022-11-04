<?php

include_once("./compoundView.php");

// FIXME style implementieren
class Header extends Compound
{
    function __construct($params)
    {
        parent::__construct($params);
        
        $styles = 
        '<link href="./templates/style.css" rel="stylesheet" type="text/css">';

        $this->views = 
        [
            "header"=> new View(["styles"=>$styles, "js-scripts"=>""], "header"),
        ];
    }
}