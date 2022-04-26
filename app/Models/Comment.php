<?php

namespace App\Models;

use App\Auth;
use App\Core\BaseModel;

class Comment extends BaseModel
{

    public function getByPostId(string $id): array
    {

        return $this->query("SELECT 
                                            c.id,
                                            c.body,
                                            c.created_at,
                                            u.name as creator_name
                                        FROM 
                                            comments c
                                        JOIN users u ON c.user_id = u.id
                                        where c.post_id = :id ORDER BY c.created_at ASC", [':id' => $id]);
    }


    public function create(array $params): void
    {

        $this->query("INSERT INTO comments (user_id, post_id, body, created_at)
                            VALUES (:user_id , :post_id , :body , NOW())"
            , [':user_id' => Auth::user()['id'], ':post_id' => $params['post_id'], ':body' => $params['body']]);
    }


    public function delete(string $id): void
    {
        $this->query("DELETE FROM comments WHERE id = :id"
            , [':id' => $id]);
    }
}