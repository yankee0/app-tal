<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Remorques as ModelsRemorques;

class Remorques extends BaseController
{
    public function list()
    {
        session()->p = 'tracteurs';
        $data = [
            'rs' => (new ModelsRemorques())->findAll(),
        ];
        return view('utils/remorques/liste', $data);
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
            if ((new ModelsRemorques())->save($data)) {
                return redirect()
                    ->back()
                    ->with('notif', true)
                    ->with('message', 'Remorque ajouté.');
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
        if ((new ModelsRemorques())->delete($data)) {
            return redirect()
                ->back()
                ->with('notif', true)
                ->with('message', 'Remorque supprimé.');
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
            'r' => (new ModelsRemorques())->find($id),
        ];
        return view('utils/remorques/modifier', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        if ((new ModelsRemorques())->save($data)) {
            return redirect()
                ->to(session()->root.'/remorques')
                ->with('notif', true)
                ->with('message', 'Remorque Modifier.');
        } else {
            return redirect()
                ->to(session()->root.'/remorques')
                ->with('notif', false)
                ->with('message', 'Echec de la modification.');
        }
    }
}
