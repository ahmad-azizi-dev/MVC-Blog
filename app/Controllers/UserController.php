<?php

namespace App\Controllers;

use App\Auth;
use App\Core\BaseController;
use App\Core\Request;
use App\Core\Response;
use App\Models\User;


class UserController extends BaseController
{

    public function loginPage(): void
    {
        Response::render('users/login.html.twig');
    }


    public function registerPage(): void
    {
        Response::render('users/register.html.twig');
    }


    public function login(): void
    {

        $user = new User();
        $inputUser = $user->getByEmail(Request::param('email'));
        if (empty($inputUser)) {
            Response::redirectBack();
        }
        if (password_verify(Request::param('password'), $inputUser['password'])) {
            Auth::login($inputUser);
            Response::redirect('/');
        }
        Response::redirectBack();
    }


    public function register(): void
    {

        $user = new User();
        $user->create(Request::params());
        $registeredUser = $user->getByEmail(Request::param('email'));
        Auth::login($registeredUser);

        Response::redirect('/');
    }


    public function logout(): void
    {
        Auth::logOut();
        Response::redirectBack();
    }

}