<?php

/** @var App\Core\Router $router */


use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\UserController;




$router->get('', [HomeController::class, 'index']);

$router->get('posts/create', [PostController::class, 'create']);
$router->post('posts', [PostController::class, 'store']);
$router->get('posts/edit', [PostController::class, 'edit']);
$router->post('posts/update', [PostController::class, 'update']);
$router->post('posts/delete', [PostController::class, 'delete']);

$router->get('users/login', [UserController::class, 'loginPage']);
$router->get('users/register', [UserController::class, 'registerPage']);
$router->post('users/login', [UserController::class, 'login']);
$router->post('users/register', [UserController::class, 'register']);
$router->get('users/logout', [UserController::class, 'logout']);