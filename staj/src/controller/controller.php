<?php

namespace SRC\controller;

class Controller{

    public function view(
        string $view,
        array $viewdata = []
    )
    {
        extract($viewdata);
        require '../../app/views/'.$view.'.php';
    }

    public function model(
        string $modelname
    )
    {
        $model = '\APP\models\\' . $modelname;
        return new $model();
    }
    
}