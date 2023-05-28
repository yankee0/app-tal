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
}
