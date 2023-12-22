<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class UsersController extends BaseController
{
    public function index()
    {
        $usersModel =  new Users;
        $data['users'] = $usersModel->getUsersEmployees();
        $title ['title'] = "Users - Page";
        return view ('/pages/users/index', ['title' => $title, 'data' => $data]);
    }

}
