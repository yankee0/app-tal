<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Remorques;
use App\Models\Tracteurs;

class Garage extends BaseController
{
    public function index()
    {
        $data = [
            'trs' => (new Tracteurs())->findAll(),
            'rms' => (new Remorques())->findAll()
        ];
        return view('utils/garage/dashboard',$data);
    }
}
