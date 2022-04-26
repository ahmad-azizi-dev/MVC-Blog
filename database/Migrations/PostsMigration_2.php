<?php

namespace Database\Migrations;

use Database\QueryInterface;

class PostsMigration_2 implements QueryInterface
{

    public static function query(): string
    {
        return "CREATE TABLE IF NOT EXISTS posts (
            `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `user_id` BIGINT UNSIGNED NOT NULL,
            `title` VARCHAR (255) NOT NULL,
            `description` TEXT NOT NULL,
            `created_at` timestamp 
            )";
    }

}