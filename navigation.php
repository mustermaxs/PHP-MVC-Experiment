<?php

include_once("./view.php");
include_once("./compoundView.php");
include_once("./home.php");

class Navigation extends Compound
{

    function __construct($params)
    {
        parent::__construct($params);

        $this->views =
        [
            "liste" => new View($this->params, "navigation_view")
        ];
    }
}