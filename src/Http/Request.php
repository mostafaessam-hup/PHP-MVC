<?php

namespace Http;

class Request
{
    public function method()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
    public function path()
    {
       $path= $_SERVER["request_uri"]??"/";
       return str_contains($path,"?") ? explode("?",$path[0]):$path;
    }
}
