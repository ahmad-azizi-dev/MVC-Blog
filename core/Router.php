<?php

namespace App\Core;


use Config\AppConfig;

/**
 *  Strategy Pattern.
 */
class Router
{
    private array $routes = [];   // example  "GET"=> [ "posts"=> ["App\Controllers\PostController" , "show"} ],


    public static function Load(): void
    {
        $router = new static();
        require AppConfig::ROUTES_DIRECTORY;
        $router->direct(Request::uri(), Request::method());
    }


    public function get(string $uri, array $routeParam): void
    {
        $this->routes[Request::GET][$uri] = $routeParam;
    }


    public function direct(string $uri, string $requestMethod): void
    {
        $routes = $this->routes[$requestMethod];
        $this->callMethod(...$routes[$uri]);
    }


    private function callMethod(string $controller, string $method): void
    {
        call_user_func([new $controller(), $method]);    // echo response
    }

}