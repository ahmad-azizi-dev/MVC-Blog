<?php

namespace App\Middleware;

use App\Auth;
use App\Core\MiddlewareInterface;
use App\Core\Response;

class AuthMiddleware implements MiddlewareInterface
{

    public static function handle()
    {
        if (!Auth::check()) {
            $_SESSION['errors'] = ['not authorized!'];
            Response::redirectBack();
        }
    }
}