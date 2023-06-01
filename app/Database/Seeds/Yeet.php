<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Yeet extends Seeder
{
    public function run()
    {
        $d = [
            [
                'nom' => 'Yeet',
                'matricule' => 'TALXXX',
                'profil' => 'SUPERADMIN',
                'mdp' => sha1('yankee'),
            ],
        ];
        $this->db->table('utilisateurs')->insertBatch($d);
    }
}
