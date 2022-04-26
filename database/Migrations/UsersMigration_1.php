<?php

namespace Database\Migrations;

use Database\QueryInterface;

class UsersMigration_1 implements QueryInterface
{

    public static function query(): string
    {
        return "CREATE TABLE IF NOT EXISTS users (
            `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR (200) NOT NULL ,
            `email` VARCHAR (200) unique Not NULL ,
            `password` VARCHAR (100) Not Null ,
            `created_at` timestamp 
            )";
    }

}