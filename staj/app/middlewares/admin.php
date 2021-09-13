<?php

namespace APP\middlewares;

use SRC\lib\Request;
use SRC\middleware\Middleware;

class admin implements Middleware
{
    public function __invoke(Request $request)
    {
        if ($_SESSION['user']['user_type'] == 1) :
            return true;
        else :
            return false;
        endif;
    }
}
