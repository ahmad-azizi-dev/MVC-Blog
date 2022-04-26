<?php

/** @var App\Core\Router $router */


use App\Controllers\HomeController;



$router->get('', [HomeController::class, 'index']);