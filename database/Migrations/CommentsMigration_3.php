<?php

namespace Database\Migrations;

use Database\QueryInterface;

class CommentsMigration_3 implements QueryInterface
{

    public static function query(): string
    {
        return "CREATE TABLE IF NOT EXISTS comments (
            `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `user_id` BIGINT UNSIGNED NOT NULL,
            `post_id` BIGINT UNSIGNED NOT NULL,
            `body` TEXT NOT NULL,
            `created_at` timestamp);
            
             ALTER TABLE comments 
             ADD FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE";
    }

}