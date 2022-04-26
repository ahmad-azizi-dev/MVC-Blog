<?php


use App\Core\Request;
use App\Core\Router;
use Config\AppConfig;


require_once __DIR__ . '/../bootstrap/bootstrap.php';


Router::Load(AppConfig::ROUTES_DIRECTORY)->direct(Request::uri(), Request::method());