<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        $title['title'] = "Login - Page";
        return view ('pages/auth/login', $title);
    }

    public function forgotPassword()
    {
        $title['title'] = "Forgot Password - Page";
        return view ('pages/auth/forgot-password', $title);
    }
}
