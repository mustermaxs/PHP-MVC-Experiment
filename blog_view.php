<?php

include_once("./compoundView.php");


class BlogPost extends Compound
{
    protected function init()
    {
        $this->views = 
        [
            "header" => new View($this->params, "header"),
            "body" => new View($this->params, "body")
        ];
    }
}