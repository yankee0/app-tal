<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Exports;
use App\Models\Livraisons;
use App\Models\Transferts;

class Archives extends BaseController
{
    public function index($data = [])
    {
        session()->p = 'archives';
        return view('utils/archives/dashboard', $data);
    }

    public function generate()
    {
        $data = $this->request->getPost();
        $res = [];
        $time = strtotime($data['date']);

        switch ($data['archive']) {
            case 't':
                $res = [
                    'transferts' => (new Transferts())
                        ->where('YEAR(date_mvt)', date('Y', $time))
                        ->where('MONTH(date_mvt)', date('m', $time))
                        ->find()
                ];
                break;
            case 'e':
                $res = [
                    'exports' => (new Exports())
                        ->where('YEAR(date_posit)', date('Y', $time))
                        ->where('MONTH(date_posit)', date('m', $time))
                        ->find()
                ];
                break;
            case 'l':
                $res = [
                    'livraisons' => (new Livraisons())
                        ->where('YEAR(date_livraison)', date('Y', $time))
                        ->where('MONTH(date_livraison)', date('m', $time))
                        ->find()
                ];
                break;

            default:
                return redirect()
                    ->back()
                    ->with('notif', false)
                    ->with('message', 'Erreur!!!!!!');
                break;
        }
        return $this->index($res);
    }
}
