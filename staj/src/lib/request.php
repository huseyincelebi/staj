<?php

namespace SRC\lib;

class Request
{
    protected string $geturl;
    protected array $getparseurl;
    protected string $getmethod;

    public function __construct(){
        $this->geturl = parse_url($_SERVER['REQUEST_URI'])['path'];
        $this->getparseurl = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $this->getmethod = $_SERVER['REQUEST_METHOD'];
    }
    
    public function geturl(){
        return $this->geturl;
    }

    public function getparseurl(){
        return $this->getparseurl;
    }

    public function getmethod(){
        return $this->getmethod;
    }
}
