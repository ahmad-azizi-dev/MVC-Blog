<?php

namespace App\Models;

use App\Core\BaseModel;


class User extends BaseModel
{

    public function getByEmail(string $email): array
    {
        $result = $this->query("SELECT * FROM users where email = :email", [':email' => $email]);
        return !$result ? [] : $result[0];
    }


    public function create(array $params)
    {
        return $this->query("INSERT INTO users (name, email, password,created_at)
                            VALUES (:name,:email,:password,NOW())"
            , [':name' => $params['name'], ':email' => $params['email'], ':password' => $this->hashPassword($params['password'])]);
    }


    private function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}


