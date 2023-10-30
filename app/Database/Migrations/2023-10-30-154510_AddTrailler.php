<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTrailler extends Migration
{
    public function up()
    {
        $this->forge->addColumn('livraisons', [
            'rem_retour' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'rem_aller' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addColumn('exports', [
            'rem_retour' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'rem_aller' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('livraisons', 'rem_retour');
        $this->forge->dropColumn('livraisons', 'rem_aller');
        $this->forge->dropColumn('exports', 'rem_retour');
        $this->forge->dropColumn('exports', 'rem_aller');
    }
}
