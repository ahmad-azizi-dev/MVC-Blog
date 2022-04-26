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




}