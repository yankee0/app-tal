<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SuperAdmin extends BaseController
{
    public function index()
    {
        session()->p = 'dashboard';
        return view('superadmin/dashboard');
    }
}
