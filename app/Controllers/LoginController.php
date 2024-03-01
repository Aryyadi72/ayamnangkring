<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function index()
    {
        $title['title'] = "Login - Page";
        return view('pages/auth/login', $title);
    }

    public function processLogin()
    {
        $usersModel = new UsersModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $usersModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set('username', $user['username']);
            session()->set('id', $user['id']);

            // if ($user['level'] == 'admin') {
            //     return redirect()->to(base_url('/'));
            // } else {
            //     return redirect()->to(base_url('/dash-guru'));
            // }
            session()->setFlashdata('success', 'Login successful. Welcome to the dashboard!');
            return redirect()->to(base_url('/'));
        } else {
            session()->setFlashdata('error', 'Username / Password salah');
            return redirect()->to(base_url('/login'));
        }
    }

    public function forgotPassword()
    {
        $title['title'] = "Forgot Password - Page";
        return view('pages/auth/forgot-password', $title);
    }

    public function logout()
    {
        $session = \Config\Services::session();

        $session->destroy();

        session()->setFlashdata('success', 'Anda Berhasil Logout!!!');
        return redirect()->to(base_url('/login'));
    }
}
