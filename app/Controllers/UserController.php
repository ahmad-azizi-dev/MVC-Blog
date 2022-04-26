<?php

namespace App\Controllers;

use App\Auth;
use App\Core\BaseController;
use App\Core\Request;
use App\Core\Response;
use App\Models\User;
use App\Validations\UserValidation;


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
        Request::Validate([
            'email' => 'required|string|minLength:4|email',
            'password' => 'required|string|minLength:6',
        ]);

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
        Request::Validate([
            'name' => 'required|string|minLength:4',
            'email' => 'required|string|minLength:5|email|uniqueEmail',
            'password' => 'required|string|minLength:6',
        ], UserValidation::class);

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