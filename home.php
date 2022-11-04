<?php

require_once("./view.php");
require_once("./navigation.php");
require_once("./compoundView.php");
require_once("./header.php");

class Home extends Compound
{
    function __construct($params)
    {
        parent::__construct($params);
        $this->views = 
        [
            "header" => new View($this->params, "header"),
            "body" => new View($this->params, "body"),
            "navigation" => new Navigation($this->params),
            "footer" => new View($this->params, "footer")
        ]; 
    }
}
