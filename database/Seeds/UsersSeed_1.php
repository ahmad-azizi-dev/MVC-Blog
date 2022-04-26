<?php

namespace Database\Seeds;


use Database\QueryInterface;

class UsersSeed_1 implements QueryInterface
{

    public static function query(): string
    {
        return "INSERT INTO users
            (id,name,email,password,created_at)
            VALUES
            (1,'Ahmad','ahmad.azizi.dev@gmail.com','" . password_hash('1q2w3e', PASSWORD_DEFAULT) . "' ,ADDDATE(NOW(), INTERVAL -2 day )),
            (2,'Daniel','daniel.sabisch@gmail.com', '" . password_hash('1q2w3e', PASSWORD_DEFAULT) . "',ADDDATE(NOW(), INTERVAL -4 day ))";
    }

}