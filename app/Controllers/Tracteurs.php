<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Remorques;
use App\Models\Tracteurs as ModelsTracteurs;

class Tracteurs extends BaseController
{
    public function list()
    {
        session()->p = 'tracteurs';
        $data = [
            'ts' => (new ModelsTracteurs())->findAll(),
            'rs' => (new Remorques())->findAll()
        ];
        return view('utils/tracteurs/liste',$data);
    }

}
