<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Garage as ModelsGarage;
use App\Models\Remorques;
use App\Models\Tracteurs;

class Garage extends BaseController
{
    public function index()
    {
        session()->p = 'garage';
        $data = [
            'trs' => (new Tracteurs())->findAll(),
            'rms' => (new Remorques())->findAll(),
            'gs' => (new ModelsGarage())
                ->orderBy('date', 'DESC')
                ->findAll(),
        ];
        return view('utils/garage/dashboard', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        if ((new ModelsGarage())->insert($data)) {
            return redirect()
                ->back()
                ->with('notif', true)
                ->with('message', 'Enregistrement réussi.');
        } else {
            return redirect()
                ->back()
                ->with('notif', false)
                ->with('message', 'Echec de l\'enregistrement.');
        }
    }

    public function delete($id)
    {
        if ((new ModelsGarage())->delete($id)) {
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
