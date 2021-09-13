<?php

namespace SRC\route;

use SRC\lib\Request;
use Closure;

class Route
{
    protected array $routes;
    protected string $group = '';
    protected array $patterns = [
        [':d' => '([0-9]+)'],
        [':a' => '([0-9a-zA-Z-]+)']
    ];

    public function group(
        string $group,
        Closure $routes,
    ) {
        $request = new Request;
        $this->group = $group;
        $routes();
        $this->group = '';
        return $this;
    }

    public function route(
        string $route,
        array|string $routemethod,
        Closure $routefunction = null,
        string $controllermethod = null,
        string $controller = null,
        array|string $middleware = null
    ) {
        $this->group == '' ?: $route = $this->group . '/?' . $route . '?';
        $this->routes[$route]['method'] = strtoupper($routemethod);
        $routefunction == null ?: $this->routes[$route]['function'] = $routefunction;
        $controllermethod == null ?: $this->routes[$route]['controllermethod'] = $controllermethod;
        $controller == null ?: $this->routes[$route]['controller'] = $controller;
        $middleware == null ?: $this->routes[$route]['middleware'] = $middleware;
        return $this;
    }

    public function dispatch()
    {
        $request = new Request;
        foreach ($this->routes as $route => $params) :
            if (in_array($request->getmethod(), (array)$params['method'])) :
                foreach ($this->patterns as $pattern) :
                    foreach ($pattern as $key => $value) :
                        $route = preg_replace('#' . $key . '#', $value, $route);
                    endforeach;
                endforeach;
                $routeurl = str_replace(['%basedirectory%'], [$request->getparseurl()[0]], '#^/%basedirectory%?/' . '?/?' . $route . '/?' . '$#');
                if (preg_match($routeurl, $request->geturl(), $match)) :
                    if (isset($params['middleware'])) :
                        foreach ((array)$params['middleware'] as $middlewarename) :
                            $middlewarepath = '\APP\middlewares\\' . $middlewarename;
                            $middleware = new $middlewarepath();
                            if (!$middleware($request)) :
                                return $this;
                            endif;
                        endforeach;
                    endif;
                    if ($request->geturl() == $match[0]) :
                        if (isset($params['controllermethod']) or isset($params['controller'])) :
                            $controllerpath = '\APP\controllers\\' . $params['controller'];
                            $controller = new $controllerpath();
                            echo call_user_func_array([$controller, $params['controllermethod']], [$request, $match]);
                            unset($this->routes);
                            return $this;
                        else :
                            $params['function']($request, $match);
                            unset($this->routes);
                            return $this;
                        endif;
                    endif;
                endif;
            else :
                foreach ($this->patterns as $pattern) :
                    foreach ($pattern as $key => $value) :
                        $route = preg_replace('#' . $key . '#', $value, $route);
                    endforeach;
                endforeach;
                $routeurl = str_replace(['%basedirectory%'], [$request->getparseurl()[0]], '#^/%basedirectory%?/' . '?/?' . $route . '/?' . '$#');
                if (preg_match($routeurl, $request->geturl(), $match)) :
                    if (isset($params['middleware'])) :
                        foreach ((array)$params['middleware'] as $middlewarename) :
                            $middlewarepath = '\APP\middlewares\\' . $middlewarename;
                            $middleware = new $middlewarepath();
                            if (!$middleware($request)) :
                                return $this;
                            endif;
                        endforeach;
                    endif;
                    if ($request->geturl() == $match[0]) :
                        if (isset($params['controllermethod']) or isset($params['controller'])) :
                            http_response_code(405);
                            require_once "../../app/templates/405.php";
                            unset($this->routes);
                            return $this;
                        else :
                            http_response_code(405);
                            require_once "../../app/templates/405.php";
                            unset($this->routes);
                            return $this;
                        endif;
                    endif;
                endif;
            endif;
        endforeach;
        if (!is_null($this->routes)) :
            http_response_code(404);
            require_once "../../app/templates/404.php";
            return $this;
        endif;
        return $this;
    }
}
