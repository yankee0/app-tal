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
        ];
        $this->db->table('utilisateurs')->insertBatch($data);
    }
}
