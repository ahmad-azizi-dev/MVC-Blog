<?php

namespace App\Core;


/**
 *  Strategy Pattern.
 */
class Router
{
    private array $routes = [];   // example  "GET"=> [ "posts"=> ["App\Controllers\PostController" , "show"} ],


    public static function Load(string $routesDirectory)
    {
        $router = new static();
        require $routesDirectory;
        return $router;
    }


    public function get(string $uri, array $routeParam): void
    {
        $this->routes[Request::GET][$uri] = $routeParam;
    }


    public function post(string $uri, array $routeParam): void
    {
        $this->routes[Request::POST][$uri] = $routeParam;
    }


    public function direct(string $uri, string $requestMethod): void
    {
        $routes = $this->routes[$requestMethod];
        if (!array_key_exists($uri, $routes)) {
            Response::notFound();
        }
        $this->callMethod(...$routes[$uri]);
    }


    private function callMethod(string $controller, string $method): void
    {
        call_user_func([new $controller(), 'action'], $method,);    // echo response
    }

}