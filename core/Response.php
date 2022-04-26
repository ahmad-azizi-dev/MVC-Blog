<?php

namespace App\Core;

use App\Auth;
use Config\AppConfig;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Response
{

    /**
     * Render a template using Twig.
     */
    public static function render(string $template, array $args = []): void
    {
        $twig = new Environment(new FilesystemLoader(AppConfig::VIEWS_DIRECTORY));

        echo $twig->render($template, array_merge($args, [
            'authCheck' => Auth::check(),
            'authUserName' => Auth::check() ? Auth::user()['name'] : ''
        ]));
    }


    public static function redirect(string $path = '/'): void
    {
        http_response_code(303);
        header("Location: $path");
        die();
    }


    public static function redirectBack($responseCode = 303): void
    {
        http_response_code($responseCode);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }


    public static function notFound(): void
    {
        http_response_code(404);
        self::render('404.html.twig');
    }


}