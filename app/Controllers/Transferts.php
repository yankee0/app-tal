<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Chauffeurs;
use App\Models\Tracteurs;
use App\Models\Transferts as ModelsTransferts;

class Transferts extends BaseController
{
    public function dashboard()
    {
        session()->p = "transferts";
        $data = [
            'chauf' => (new Chauffeurs())->orderBy('nom','ASC')->findAll(),
            'trac' => (new Tracteurs())->orderBy('chrono','ASC')->findAll(),
            'ts' => (new ModelsTransferts())
            ->where('eirs','NON OK')
            ->orWhere('type','')
            ->orWhere('type',null)
            ->findAll()
        ];
        return view('utils/transferts/dashboard', $data);
    }

    public function create()
    {
        // dd($this->request->getPost());
        if ((new ModelsTransferts())->insert($this->request->getPost())) {
            return redirect()
                ->back()
                ->with('notif', 'true')
                ->with('message', 'Enregistrement réussie.');
        } else {
            return redirect()
                ->back()
                ->with('notif', 'false')
                ->with('message', 'Echec de l\'enregistrement.');
        }
    }

    public function delete()
    {
        $data = $this->request->getGet();
        $modele = new ModelsTransferts();

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

    public function edit($id)
    {
        $data = [
            't' => (new ModelsTransferts())->find($id),
            'chauf' => (new Chauffeurs())->orderBy('nom','ASC')->findAll(),
            'trac' => (new Tracteurs())->orderBy('chrono','ASC')->findAll()
        ];

        return view('utils/transferts/modifier', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        if ((new ModelsTransferts())->save($data)) {
            return redirect()
                ->to(session()->root . '/transferts')
                ->with('notif', true)
                ->with('message', 'Mis à jour réussie.');
        } else {
            return redirect()
                ->back()
                ->with('notif', false)
                ->with('message', 'Echec de la mis à jour.');
        }
    }
}
