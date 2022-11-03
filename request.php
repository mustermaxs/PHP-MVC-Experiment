<?php

class Request
{
    
    public function getPath()
    {
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        $regex_path = "/(?P<controller>[a-z-]+)\/(?P<"
        return $path;
    }

    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
}