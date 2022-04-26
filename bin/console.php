<?php

use App\Core\AppContainer;
use App\Core\DbConnection;
use Config\AppConfig;
use Config\DatabaseConfig;
use Database\QueryHandler;


define("__ROOT__", dirname(__DIR__));
require_once __ROOT__ . '/vendor/autoload.php';

$pdoConn = AppContainer::make(DbConnection::Class)->getConnection();


if ($argv[1] == 'migrate:up') {
    QueryHandler::run($pdoConn, AppConfig::MIGRATIONS_DIRECTORY);

} elseif ($argv[1] == 'migrate:down') {
    $pdoConn->query("drop database if exists " . DatabaseConfig::DB_NAME
        . "; create database " . DatabaseConfig::DB_NAME);
}
