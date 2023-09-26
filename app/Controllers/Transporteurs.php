<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transporteurs as ModelsTransporteurs;

class Transporteurs extends BaseController
{
    public function __construct(){
        session()->p = "transporteurs";
    }
    public function list()
    {
        return view('utils/transporteurs/list', [
            'ts' => (new ModelsTransporteurs())->findAll()
        ]);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $data['nom'] = strtoupper($data['nom']);
        $modele = new ModelsTransporteurs();
        $modele->save($data);
        return redirect()
            ->back()
            ->with('notif', true)
            ->with('message', 'Ajout du transporteur réussie.');
    }

    public function edit($id)
    {
        return view('utils/transporteurs/edit', (new ModelsTransporteurs())->find($id));
    }

    public function delete()
    {
        $data = $this->request->getGet();
        $modele = new ModelsTransporteurs();

        if ($modele->delete($data)) {
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
