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

                case 'ADMIN':
                    session()->set('root');
                    session()->root = $destination  = '/admin';
                    break;

                case 'OPS':
                    session()->set('root');
                    session()->root = $destination  = '/ops';
                    break;

                case 'FACTURATION':
                    session()->set('root');
                    session()->root = $destination  = '/facturation';
                    break;

                case 'GARAGISTE':
                    session()->set('root');
                    session()->root = $destination  = '/garagiste';
                    break;
                case 'G. CARBURANT':
                    session()->set('root');
                    session()->root = $destination  = '/g_carburant';
                    break;

                default:
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('notif', 'false')
                        ->with('message', 'Identifiants incorrects.');
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
