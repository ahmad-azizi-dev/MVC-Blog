<?php

use App\Core\AppContainer;
use App\Core\DbConnection;
use Config\AppConfig;
use Config\DatabaseConfig;
use Database\QueryHandler;


define("__ROOT__", dirname(__DIR__));
require_once __ROOT__ . '/vendor/autoload.php';

$pdoConn = AppContainer::make(DbConnection::Class)->getConnection();


switch ($argv[1]) {
    case 'migrate:up':
        QueryHandler::run($pdoConn, AppConfig::MIGRATIONS_DIRECTORY);
        break;

    case 'db:seed':
        QueryHandler::run($pdoConn, AppConfig::SEEDS_DIRECTORY);
        break;

    case 'migrate:down':
        $pdoConn->query("drop database if exists " . DatabaseConfig::DB_NAME
            . "; create database " . DatabaseConfig::DB_NAME);
}
