<?php

namespace App\Controllers;


use App\Core\BaseController;
use App\Core\Request;
use App\Core\Response;
use App\Middleware\AuthMiddleware;
use App\Models\Comment;


class CommentController extends BaseController
{

    protected function before(): void
    {
        AuthMiddleware::handle();
    }


    public function store(): void
    {
        Request::Validate([
            'post_id' => 'required|numeric',
            'body' => 'required|string|minLength:4',
        ]);

        $comment = new Comment();
        $comment->create(Request::params());
        Response::redirectBack();
    }


    public function delete(): void
    {
        Request::Validate([
            'id' => 'required|numeric',
        ]);

        $comment = new Comment();
        $comment->delete(Request::param('id'));
        Response::redirectBack();
    }

}