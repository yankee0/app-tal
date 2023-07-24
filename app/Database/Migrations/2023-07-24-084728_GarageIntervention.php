<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GarageIntervention extends Migration
{
    public function up()
    {
        $this->forge->addColumn('garage',[
            'intervention' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'intervenants' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('garage',['intervention','intervenants']);
    }
}
