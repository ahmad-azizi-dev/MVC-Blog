<?php

namespace App\Controllers;


use App\Auth;
use App\Core\BaseController;
use App\Core\Request;
use App\Core\Response;
use App\Models\Post;


class PostController extends BaseController
{

    public function create(): void
    {
        Response::render('posts/create.html.twig');
    }


    public function store(): void
    {
        $posts = new Post();
        $posts->create(array_merge(Request::params(), ['user_id' => Auth::user()['id']]));
        Response::redirect('/');
    }


    public function edit(): void
    {
        $posts = new Post();
        Response::render('posts/edit.html.twig', [
            'post' => $posts->getById(Request::param('id'))
        ]);
    }


    public function update(): void
    {
        $posts = new Post();
        $posts->update(Request::params());
        Response::redirect('/');
    }


    public function delete(): void
    {
        $posts = new Post();
        $posts->delete(Request::param('id'));
        Response::redirect('/');
    }

}