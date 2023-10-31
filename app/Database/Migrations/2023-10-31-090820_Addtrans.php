<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addtrans extends Migration
{
    public function up()
    {
        $this->forge->addColumn('livraisons', [
            'transporteur' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addColumn('exports', [
            'transporteur' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('livraisons', 'transporteur');
        $this->forge->dropColumn('exports', 'transporteur');
    }
}
