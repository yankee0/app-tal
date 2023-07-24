<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TypeExport extends Migration
{
    public function up()
    {
        $this->forge->addColumn('exports',[
            'type_operation' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => 'TOM'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('exports','type_operation');
    }
}
