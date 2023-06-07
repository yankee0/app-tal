<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TypeTransfert extends Migration
{
    public function up()
    {
        $this->forge->addColumn('transferts',[
            'type' => [
                'type' => 'ENUM("TOM","WALL")',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('transferts','type');
    }
}
