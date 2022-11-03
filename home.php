<?php

require_once("./view.php");
require_once("./navigation.php");
require_once("./compoundView.php");


/* ? für Komposit-Templates eigene Klasse ("CompositView") kreieren:
** # die von "View" erbt aber im Konstruktor NICHT assignNecessaryParams aufruft
**   (funktioniert ja nur für einzelne Templates) 
*/
// ? eigene CompositView::render Methode die View::render überschreibt
// ? (oder CompositeView::renderAll) und alle $views mit Parametern initialisiert

// ? View::displayAll nicht in View, sondern in CompositView

class Home extends Compound
{
    function __construct($params)
    {
        if ($params == null)
        {
            return 0;
        }
        
        $this->views = 
        [
            "header" => new View($params, "header"),
            "body" => new View($params, "body"),
            "footer" => new View($params, "footer")
        ]; 
    }
}
// ? HUBER fragen: untere Deklaration von $views funktioniert nicht Fehler:
// FIXME Fatal error: New expressions are not supported in this context in C:\xampp\htdocs\mvc_test\home.php on line 20

// class Home extends Compound
// {
//     public $views = 
//     [
//         "header" => new View(null, "header"),
//         "body" => new View(null, "body"),
//         "footer" => new View(null, "footer")
//     ];

// }