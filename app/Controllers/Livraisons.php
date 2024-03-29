<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Chauffeurs;
use App\Models\Livraisons as ModelsLivraisons;
use App\Models\Remorques;
use App\Models\Tracteurs;
use App\Models\Transporteurs;

class Livraisons extends BaseController
{
    public function dashboard()
    {
        session()->p = 'livraisons';
        $data = [
            'ls' => (new ModelsLivraisons())
                ->where('chauffeur_retour', '')
                ->orWhere('chauffeur_retour', null)
                ->where('date_retour', '')
                ->where('date_retour', '00-00-0000')
                ->orWhere('date_retour', null)
                ->where('mvt_retour', '')
                ->orWhere('mvt_retour', null)
                ->findAll(),
            'chauf' => (new Chauffeurs())->orderBy('nom', 'ASC')->findAll(),
            'trac' => (new Tracteurs())->orderBy('chrono', 'ASC')->findAll(),
            "rem" => (new Remorques())->findAll(),
            'dl' => (new ModelsLivraisons())->where('MONTH(date_livraison)', date('m'))->find(),
            'transporteur' => (new Transporteurs())->findAll()
        ];

        return view('utils/livraisons/dashboard', $data);
    }

    public function create()
    {
        if ((new ModelsLivraisons())->insert($this->request->getPost())) {
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
        $modele = new ModelsLivraisons();

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
            'l' => (new ModelsLivraisons())->find($id),
            'chauf' => (new Chauffeurs())->orderBy('nom', 'ASC')->findAll(),
            'trac' => (new Tracteurs())->orderBy('chrono', 'ASC')->findAll(),
            'transporteur' => (new Transporteurs())->findAll(),
            "rem" => (new Remorques())->findAll(),

        ];

        return view('utils/livraisons/modifier', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        if ((new ModelsLivraisons())->save($data)) {
            return redirect()
                ->to(session()->root . '/livraisons')
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
