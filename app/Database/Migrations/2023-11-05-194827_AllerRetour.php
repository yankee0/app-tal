<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AllerRetour extends Migration
{
    public function up()
    {
        $this->forge->addColumn('livraisons', [
            'cam_aller' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'cam_retour' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('livraisons', ['cam_aller', 'cam_retour']);
    }
}
