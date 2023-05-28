<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Utilisateurs;

class Auth extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $data = $this->request->getPost();
        $data['mdp'] = sha1($data['mdp']);
        $data['matricule'] = strtoupper($data['matricule']);
        $creds = (new Utilisateurs())->where($data)->first();
        if ($creds) {
            session()->set('u', $creds);
            switch ($creds['profil']) {
                case 'SUPERADMIN':
                    session()->set('root', 'super-admin');
                    break;

                default:
                    session()->setFlashdata('notif', 'false');
                    session()->setFlashdata('message', 'Profil incorrect.');
                    break;
            }
            return redirect()->to(session()->root);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('notif', 'false')
                ->with('message', 'Identifiants incorrects.');
        }
    }

    public function logout()
    {
        session()->remove('u');
        return redirect()->to('/');
    }
}
