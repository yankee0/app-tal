<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Remorques;
use App\Models\Tracteurs as ModelsTracteurs;
use App\Models\Transporteurs;

class Tracteurs extends BaseController
{
    public function list()
    {
        session()->p = 'tracteurs';
        $data = [
            'ts' => (new ModelsTracteurs())->findAll(),
            'rs' => (new Remorques())->findAll(),
            'ss' => (new Transporteurs())->findAll()
        ];
        return view('utils/tracteurs/liste', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        // dd($data);
        $rules = [
            'chrono' => [
                'rules' => 'is_unique[tracteurs.chrono]',
                'error' => [
                    'is_unique' => 'Chrono en doublon.'
                ]
            ],
            'immatriculation' => [
                'rules' => 'is_unique[tracteurs.chrono]',
                'error' => [
                    'is_unique' => 'Chrono en doublon.'
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->with('notif', false)
                ->with('message', $this->validator->listErrors());
        } else {
            if ((new ModelsTracteurs())->save($data)) {
                return redirect()
                    ->back()
                    ->with('notif', true)
                    ->with('message', 'Trateur ajouté.');
            } else {
                return redirect()
                    ->back()
                    ->with('notif', false)
                    ->with('message', 'Echec de l\'ajout.');
            }
        }
    }

    public function delete()
    {
        $data = $this->request->getGet();
        if ((new ModelsTracteurs())->delete($data)) {
            return redirect()
                ->back()
                ->with('notif', true)
                ->with('message', 'Trateur supprimé.');
        } else {
            return redirect()
                ->back()
                ->with('notif', false)
                ->with('message', 'Echec de la suppression.');
        }
    }

    public function edit(string $id)
    {
        $data = [
            't' => (new ModelsTracteurs())->find($id),
            'ss' => (new Transporteurs())->findAll()

        ];
        return view('utils/tracteurs/modifier', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        if ((new ModelsTracteurs())->save($data)) {
            return redirect()
                ->to(session()->root.'/tracteurs')
                ->with('notif', true)
                ->with('message', 'Trateur Modifier.');
        } else {
            return redirect()
                ->to(session()->root.'/tracteurs')
                ->with('notif', false)
                ->with('message', 'Echec de la modification.');
        }
    }
}
