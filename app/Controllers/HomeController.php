<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Response;
use App\Models\Post;


class HomeController extends BaseController
{

    public function index()
    {
        $posts = new Post();
        Response::render('home.html.twig', [
            'posts' => $posts->getAllWithCreatorUserName()
        ]);
    }

}