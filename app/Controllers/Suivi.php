<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Remorques;
use App\Models\Tracteurs;
use CodeIgniter\Database\MySQLi\Utils;

class Suivi extends BaseController
{
    public function index()
    {
        session()->p = 'suivi-flotte';
        $data = [
            'tracs' => (new Tracteurs())->countAll(),
            'rems' => (new Remorques())->countAll(),
            'deadVTTracs' => (new Tracteurs())
                ->where('fin_vt <=', date('Y-m-d', strtotime('+20 days')))
                ->find(),
            'deadASTracs' => (new Tracteurs())
                ->where('fin_as <=', date('Y-m-d', strtotime('+20 days')))
                ->find(),
            'deadCATTracs' => (new Tracteurs())
                ->where('fin_cats <=', date('Y-m-d', strtotime('+20 days')))
                ->find(),
            'deadVTRems' => (new Remorques())
                ->where('fin_vt <=', date('Y-m-d', strtotime('+20 days')))
                ->find(),
            'deadASRems' => (new Remorques())
                ->where('fin_as <=', date('Y-m-d', strtotime('+20 days')))
                ->find(),
            'deadCATRems' => (new Remorques())
                ->where('fin_cats <=', date('Y-m-d', strtotime('+20 days')))
                ->find(),
        ];

        return view('utils/suivi/index.php', $data);
    }
}
