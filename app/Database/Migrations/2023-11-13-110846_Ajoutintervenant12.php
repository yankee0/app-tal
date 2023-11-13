<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ajoutintervenant12 extends Migration
{
    public function up()
    {
        $this->forge->addColumn('garage',[
            'intervenant2' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('garage', 'intervenant2');
    }
}
