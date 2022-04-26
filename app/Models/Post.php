<?php

namespace App\Models;


use App\Core\BaseModel;


class Post extends BaseModel
{

    public function getAllWithCreatorUserName()
    {
        return $this->query("SELECT 
                                            p.id, 
                                            p.title, 
                                            p.description,
                                            p.created_at,
                                            u.name as creator_name
                                        FROM
                                                posts p
                                        JOIN users u ON p.user_id = u.id ORDER BY p.created_at DESC");
    }


    public function getByIdWithCreatorUserName(string $id)
    {
        return $this->query("SELECT 
                                            p.id, 
                                            p.title, 
                                            p.description,
                                            p.created_at,
                                            u.name as creator_name
                                        FROM
                                                posts p
                                        JOIN users u ON p.user_id = u.id where p.id = :id", [':id' => $id])[0];
    }


    public function getById(string $id)
    {
        return $this->query("SELECT * FROM posts where id = :id", [':id' => $id])[0];
    }


    public function create(array $params): void
    {
        $this->query("INSERT INTO posts (user_id, title, description,created_at)
                            VALUES (:user_id,:title,:description,NOW())"
            , [':user_id' => $params['user_id'], ':title' => $params['title'], ':description' => $params['description']]);
    }


    public function update(array $params): void
    {
        $this->query("UPDATE posts SET title= :title
                            , description = :description , created_at = now() WHERE id = :id"
            , [':title' => $params['title'], ':description' => $params['description'], ':id' => $params['id']]);
    }


    public function delete(string $id): void
    {
        $this->query("DELETE FROM posts WHERE id = :id"
            , [':id' => $id]);
    }

}