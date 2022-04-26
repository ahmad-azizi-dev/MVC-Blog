<?php

namespace App\Core;

use Config\DatabaseConfig;
use PDO;

final class DbConnection
{
    private PDO $pdoConn;

    public function __construct()
    {
        $this->pdoConn = new PDO("mysql:host=" . DatabaseConfig::DB_HOST . ";port=" . DatabaseConfig::DB_PORT . ";dbname="
            . DatabaseConfig::DB_NAME, DatabaseConfig::DB_USER, DatabaseConfig::DB_PASSWORD);

        $this->pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function getConnection(): PDO
    {
        return $this->pdoConn;
    }
}