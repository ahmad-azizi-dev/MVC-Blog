<?php

namespace App\Controllers;

use App\Auth;
use App\Core\BaseController;
use App\Core\Request;
use App\Core\Response;
use App\Models\Comment;
use App\Models\Post;


class PostController extends BaseController
{

    public function show(): void
    {
        Request::Validate([
            'id' => 'required|numeric',
        ]);

        $id = Request::param('id');
        $posts = new Post();
        $comments = new Comment();

        Response::render('posts/show.html.twig', [
            'post' => $posts->getByIdWithCreatorUserName($id),
            'comments' => $comments->getByPostId($id)
        ]);
    }


    public function create(): void
    {
        Response::render('posts/create.html.twig');
    }


    public function store(): void
    {
        Request::Validate([
            'title' => 'required|string|minLength:4',
            'description' => 'required|string|minLength:4',
        ]);

        $posts = new Post();
        $posts->create(array_merge(Request::params(), ['user_id' => Auth::user()['id']]));
        Response::redirect('/');
    }


    public function edit(): void
    {
        Request::Validate([
            'id' => 'required|numeric',
        ]);

        $posts = new Post();
        Response::render('posts/edit.html.twig', [
            'post' => $posts->getById(Request::param('id'))
        ]);
    }


    public function update(): void
    {
        Request::Validate([
            'id' => 'required|numeric',
            'title' => 'required|string|minLength:4',
            'description' => 'required|string|minLength:4',
        ]);

        $posts = new Post();
        $posts->update(Request::params());
        Response::redirect('/');
    }


    public function delete(): void
    {
        Request::Validate([
            'id' => 'required|numeric',
        ]);

        $posts = new Post();
        $posts->delete(Request::param('id'));
        Response::redirect('/');
    }

}