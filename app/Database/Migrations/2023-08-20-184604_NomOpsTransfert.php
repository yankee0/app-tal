<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NomOpsTransfert extends Migration
{
    public function up()
    {
        $this->forge->addColumn('transferts', [
            'nom_ops' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
