<?php

namespace App\Controllers;

use App\Models\Tracteurs;
use App\Models\Chauffeurs;
use App\Models\Transporteurs;
use App\Controllers\BaseController;
use App\Models\Transferts as ModelsTransferts;

class Transferts extends BaseController
{
    public function dashboard()
    {
        session()->p = "transferts";
        $data = [
            'chauf' => (new Chauffeurs())->orderBy('nom', 'ASC')->findAll(),
            'trac' => (new Tracteurs())->orderBy('chrono', 'ASC')->findAll(),
            'ts' => (new ModelsTransferts())
                ->where('eirs', 'NON OK')
                ->orWhere('type', '')
                ->orWhere('type', null)
                ->findAll(),
            'dt' => (new ModelsTransferts())->where('MONTH(date_mvt)', date('m'))->find(),
            'transporteur' => (new Transporteurs())->findAll(),

        ];
        return view('utils/transferts/dashboard', $data);
    }

    public function create()
    {
        // dd($this->request->getPost());
        $check = $this->request->getPost();
        $check['date_mvt'] = strtotime($check['date_mvt']);
        $check['date_mvt'] = date('Y-m-d', $check['date_mvt']);
        $occ = (new ModelsTransferts())
            ->where('DATE(date_mvt)', $check['date_mvt'])
            ->where('conteneur', $check['conteneur'])
            ->where('type_transfert', $check['type_transfert'])
            ->find();
        if (sizeof($occ) != 0) {
            return redirect()
                ->back()
                ->withInput()
                ->with('notif', false)
                ->with('message', 'Doublon détecté.');
        }

        if ((new ModelsTransferts())->insert($this->request->getPost())) {
            return redirect()
                ->back()
                ->with('notif', true)
                ->with('message', 'Enregistrement réussie.');
        } else {
            return redirect()
                ->back()
                ->with('notif', false)
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
            'chauf' => (new Chauffeurs())->orderBy('nom', 'ASC')->findAll(),
            'trac' => (new Tracteurs())->orderBy('chrono', 'ASC')->findAll(),
            'transporteur' => (new Transporteurs())->findAll(),
        ];

        return view('utils/transferts/modifier', $data);
    }

    public function save()
    {
        $check = $this->request->getPost();
        $check['date_mvt'] = strtotime($check['date_mvt']);
        $check['date_mvt'] = date('Y-m-d', $check['date_mvt']);
        $occ = (new ModelsTransferts())
            ->where('DATE(date_mvt)', $check['date_mvt'])
            ->where('conteneur', $check['conteneur'])
            ->where('type_transfert', $check['type_transfert'])
            ->find();
        if (sizeof($occ) > 1) {
            return redirect()
                ->back()
                ->withInput()
                ->with('notif', false)
                ->with('message', 'Doublon détecté.');
        }

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
