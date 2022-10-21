<?php

class Request
{
    
    public function getPath()
    {
        // echo "<pre>";
        // var_dump($_SERVER);
        // echo "</pre>";
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        return $path;
    }

    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
}