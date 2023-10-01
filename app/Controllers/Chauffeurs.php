<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Chauffeurs as ModelsChauffeurs;
use App\Models\Transporteurs;

class Chauffeurs extends BaseController
{
    public function list()
    {
        session()->p = 'chauffeurs';
        $data = [
            'cs' => (new ModelsChauffeurs())->findAll(),
            'ss' => (new Transporteurs())->findAll(),
        ];

        return view('utils/chauffeurs/liste', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $data['nom'] = ucwords($data['nom']);
        $data['matricule'] = strtoupper($data['matricule']);
        // dd($data);
        $rules = [
            'nom' => [
                'rules' => 'alpha_space',
                'errors' => [
                    'alpha_space' => 'Nom incorrect.'
                ]
            ],
            'matricule' => [
                'rules' => 'is_unique[chauffeurs.matricule]',
                'errors' => [
                    'is_unique' => 'Matricule en doublon'
                ],
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->with('notif', false)
                ->with('message', $this->validator->listErrors());
        } else {
            if ((new ModelsChauffeurs())->save($data)) {
                return redirect()
                    ->back()
                    ->with('notif', true)
                    ->with('message', 'Ajout du chauffeur réussie.');
            } else {
                return redirect()
                    ->back()
                    ->with('notif', false)
                    ->with('message', 'Échec de l\'ajout du chauffeur.');
            }
        }
    }

    public function delete()
    {
        $data = $this->request->getGet();
        $modele = new ModelsChauffeurs();

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
            'c' => (new ModelsChauffeurs())->find($id),
            'ss' => (new Transporteurs())->findAll(),
        ];

        return view('utils/chauffeurs/modifier', $data);
    }

    public function save()
    {

        $data = $this->request->getPost();
        $data['nom'] = ucwords($data['nom']);
        $data['matricule'] = strtoupper($data['matricule']);

        $oc = (new ModelsChauffeurs())->find($data['id']);
        $rules = [
            'nom' => [
                'rules' => 'alpha_space',
                'errors' => [
                    'alpha_space' => 'Nom incorrect.'
                ]
            ],
            'matricule' => [
                'rules' => 'is_unique[chauffeurs.matricule,matricule,'.$oc['matricule'].']',
                'errors' => [
                    'is_unique' => 'Matricule en doublon'
                ],
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->with('notif', false)
                ->with('message', $this->validator->listErrors());
        } else {
            if ((new ModelsChauffeurs())->save($data)) {
                return redirect()
                    ->to(session()->root.'/chauffeurs')
                    ->with('notif', true)
                    ->with('message', 'Modification du chauffeur réussie.');
                } else {
                    return redirect()
                    ->back()
                    ->withInput()
                    ->with('notif', false)
                    ->with('message', 'Échec de la modification du chauffeur.');
            }
        }
        
    }
}
