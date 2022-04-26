<?php

namespace App\Core;

class Request
{
    const GET = 'GET';
    const POST = 'POST';


    public static function uri(): string
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }


    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }


    public static function params(): array
    {
        return self::method() == self::GET ? $_GET : $_POST;
    }


    public static function param($name): ?string
    {
        return self::params()[$name] ?? null;
    }


    public static function Validate(array $rules, string $validationClass = Validation::class)
    {
        $validation = new $validationClass($rules);
        if (!$validation->isValid()) {
            Response::redirectBack(400);
        }
    }

}