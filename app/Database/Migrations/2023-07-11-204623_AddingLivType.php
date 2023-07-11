<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddingLivType extends Migration
{
    public function up()
    {
        $this->forge->addColumn('livraisons',[
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => 'TOM'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('livraisons','type');
    }
}
