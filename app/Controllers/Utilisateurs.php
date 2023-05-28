<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Utilisateurs as ModelsUtilisateurs;

class Utilisateurs extends BaseController
{
    public function changePassword()
    {
        $data = $this->request->getPost();

        $rules = [
            'mdpn' => [
                'rules' => 'min_length[7]|required',
                'errors' => [
                    'min_length' => 'Mot de passe trop faibles.',
                    'required' => 'Nouveau mot de passe requis.'
                ]
            ],
            'mdpc' => [
                'rules' => 'matches[mdpn]',
                'errors' => [
                    'matches' => 'Les mots de passe saisis diffèrent.'
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->with('notif', false)
                ->with('message', $this->validator->listErrors());
        } else {
            $check = (new ModelsUtilisateurs())
                ->where('id', $data['id'])
                ->where('mdp', sha1($data['mdp']))
                ->first();
            if (!$check) {
                return redirect()
                    ->back()
                    ->with('notif', false)
                    ->with('message', 'Mot de passe incorrect');
            } else {

                $data['mdp'] = sha1($data['mdpn']);
                if ((new ModelsUtilisateurs())->save($data)) {
                    return redirect()
                        ->back()
                        ->with('notif', true)
                        ->with('message', 'Votre mot de passe a été modifié.');
                } else {
                    return redirect()
                        ->back()
                        ->with('notif', false)
                        ->with('message', 'Echec de la modification.');
                }
            }
        }
    }

    public function list()
    {
        session()->p = 'utilisateurs';
        $data = [
            'us' => (new ModelsUtilisateurs())->findAll(),
        ];
        return view('utils/utilisateurs/liste.php', $data);
    }

    public function delete()
    {
        $data = $this->request->getGet();
        $modele = new ModelsUtilisateurs();

        if ($modele->delete($data)) {
            if ($data['id'] == session()->u['id']) {
                return redirect()
                    ->to('deconnexion')
                    ->with('notif', false)
                    ->with('message', 'Session supprimée.');
            }
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

    public function create()
    {
        $data = $this->request->getPost();
        $data['mdp'] = sha1('Tal1234567');
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
                'rules' => 'is_unique[utilisateurs.matricule]',
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
            if ((new ModelsUtilisateurs())->save($data)) {
                return redirect()
                    ->back()
                    ->with('notif', true)
                    ->with('message', 'Création de l\'utilisateur réussie.');
            } else {
                return redirect()
                    ->back()
                    ->with('notif', false)
                    ->with('message', 'Échec de la création de l\'utilisateur.');
            }
        }
    }
}
