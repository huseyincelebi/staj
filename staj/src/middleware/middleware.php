<?php

namespace SRC\middleware;
use SRC\lib\Request;

interface Middleware{
    public function __invoke(Request $request);
}