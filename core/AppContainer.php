<?php

namespace App\Core;

/**
 *  Singleton design pattern.
 *
 *  Works like service container.
 */
final class AppContainer
{
    private static array $registry = [];


    public static function make(string $className)
    {
        if (!isset(self::$registry[$className])) {
            self::$registry[$className] = new $className();
        }

        return self::$registry[$className];
    }
}