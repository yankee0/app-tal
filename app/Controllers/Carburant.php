<?php

namespace App\Controllers;

use App\Models\Remorques;
use App\Models\Tracteurs;
use App\Controllers\BaseController;
use App\Models\Carburant as ModelsCarburant;

class Carburant extends BaseController
{
    public function index()
    {
        session()->p = 'carburant';
        $data = [
            'trs' => (new Tracteurs())->findAll(),
            'rms' => (new Remorques())->where('type','HAMMAR')->find(),
            'cs' => (new ModelsCarburant())->findAll(),
        ];

        return view('utils/carburant/dashboard',$data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        if ((new ModelsCarburant())->insert($data)) {
            return redirect()
                ->back()
                ->with('notif', true)
                ->with('message', 'Enregistrement réussi.');
        }else {
            return redirect()
                ->back()
                ->with('notif', false)
                ->with('message', 'Echec de l\'enregistrement.');
        }
    }

    public function delete($id)
    {
        if ((new ModelsCarburant())->delete($id)) {
            return redirect()
                ->back()
                ->with('notif', true)
                ->with('message', 'Suppression réussie.');
        } else {
            return redirect()
                ->back()
                ->with('notif', false)
                ->with('message', 'Echec de la suppression.');
        }
    }
}
