<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    protected $filters = ['auth'];

    protected $helpers = ['form'];
    
    public function index()
    {
        //
    }
}
