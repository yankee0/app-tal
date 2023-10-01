<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Soci extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tracteurs', [
            'societe' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => 'TAL',
            ],
        ]);
        $this->forge->addColumn('remorques', [
            'societe' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => 'TAL',
            ],
        ]);
        $this->forge->addColumn('chauffeurs', [
            'societe' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => 'TAL',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tracteurs', 'societe');
        $this->forge->dropColumn('remorques', 'societe');
        $this->forge->dropColumn('chauffeurs', 'societe');
    }
}
