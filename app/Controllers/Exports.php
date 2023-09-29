<?php

namespace App\Controllers;

use App\Models\Tracteurs;
use App\Models\Chauffeurs;
use App\Controllers\BaseController;
use App\Models\Exports as ModelsExports;
use App\Models\Transporteurs;

class Exports extends BaseController
{
    public function dashboard()
    {
        session()->p = 'exports';
        $data = [
            'es' => (new ModelsExports())
                ->where('chauffeur_retour', '')
                ->orWhere('chauffeur_retour', null)
                ->where('camion_retour', '')
                ->orWhere('camion_retour', null)
                ->findAll(),
            'chauf' => (new Chauffeurs())->orderBy('nom', 'ASC')->findAll(),
            'trac' => (new Tracteurs())->orderBy('chrono', 'ASC')->findAll(),
            'de' => (new ModelsExports())->where('MONTH(date_posit)', date('m'))->find(),
            'transporteur' => (new Transporteurs())->findAll()
        ];

        return view('utils/exports/dashboard', $data);
    }

    public function create()
    {
        if ((new ModelsExports())->insert($this->request->getPost())) {
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
        $modele = new ModelsExports();

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
            'e' => (new ModelsExports())->find($id),
            'chauf' => (new Chauffeurs())->orderBy('nom', 'ASC')->findAll(),
            'trac' => (new Tracteurs())->orderBy('chrono', 'ASC')->findAll(),
            'transporteur' => (new Transporteurs())->findAll()
        ];

        return view('utils/exports/modifier', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        if ((new ModelsExports())->save($data)) {
            return redirect()
                ->to(session()->root . '/exports')
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
