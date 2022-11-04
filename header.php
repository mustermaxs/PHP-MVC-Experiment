<!-- <?php

include_once("./compoundView.php");

// FIXME style implementieren
class Header extends Compound
{
    function __construct($params)
    {
        parent::__construct($params);
        
        $styles = 
        '<link href="./templates/style.css" rel="text/css" type="stylesheet">';

        $this->views = 
        [
            "header"=> new View(null, "header"),
        ];
    }
}