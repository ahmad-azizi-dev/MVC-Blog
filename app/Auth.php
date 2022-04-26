<?php

namespace App;


class Auth
{

    public static function login(array $inputUser): void
    {
        $_SESSION['user'] = $inputUser;  //todo do we need to separate the hashed password?
    }


    public static function check(): bool
    {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }


    public static function logOut(): void
    {
        session_destroy();
    }


    public static function user()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        return false;
    }

}