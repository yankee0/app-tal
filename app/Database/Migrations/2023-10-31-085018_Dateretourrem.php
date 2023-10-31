<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dateretourrem extends Migration
{
    public function up()
    {
        $this->forge->addColumn('livraisons', [
            'retour_rem' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);
        $this->forge->addColumn('exports', [
            'retour_rem' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('livraisons', 'retour_rem');
        $this->forge->dropColumn('exports', 'retour_rem');
    }
}
