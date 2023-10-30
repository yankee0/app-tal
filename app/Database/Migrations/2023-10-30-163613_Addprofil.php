<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addprofil extends Migration
{
    public function up()
    {
        $this->forge->addColumn('chauffeurs', [
            'statut' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('chauffeurs', 'statut');
    }
}
