<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom' => 'Yankee Suprem',
                'matricule' => 'TAL007',
                'profil' => 'SUPERADMIN',
                'mdp' => sha1('yankee'),
            ],
            [
                'nom' => 'Tal',
                'matricule' => 'TAL008',
                'profil' => 'ADMIN',
                'mdp' => sha1('yankee')
            ],
            [
                'nom' => 'Tal',
                'matricule' => 'TAL009',
                'profil' => 'OPS',
                'mdp' => sha1('yankee')
            ],
            [
                'nom' => 'Tal',
                'matricule' => 'TAL010',
                'profil' => 'FACTURATION',
                'mdp' => sha1('yankee')
            ],
            [
                'nom' => 'Tal',
                'matricule' => 'TAL011',
                'profil' => 'GARAGISTE',
                'mdp' => sha1('yankee')
            ],
            [
                'nom' => 'Tal',
                'matricule' => 'TAL012',
                'profil' => 'G. CARBURANT',
                'mdp' => sha1('yankee')
            ]
        ];
        $this->db->table('utilisateurs')->insertBatch($data);
    }
}
