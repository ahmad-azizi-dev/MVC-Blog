<?php

namespace App\Core;

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

        echo $twig->render($template, $args);
    }


    public static function notFound(): void
    {
        http_response_code(404);
        self::render('404.html.twig');
    }


}