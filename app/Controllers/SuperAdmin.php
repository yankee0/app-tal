<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Livraisons;
use App\Models\Tracteurs;
use App\Models\Transferts;

class SuperAdmin extends BaseController
{
    public function index()
    {
        session()->p = 'dashboard';
        return view('superadmin/dashboard',[
            'l' => (new Livraisons())->countAll(),
            't' => (new Transferts())->countAll(),
            'e' => (new Livraisons())->countAll(),
            'c' => (new Tracteurs())->countAll()
        ]);
    }
}
