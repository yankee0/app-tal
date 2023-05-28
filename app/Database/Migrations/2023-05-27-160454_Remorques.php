<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Remorques extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'chrono' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'immatriculation' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'ancienne_immatriculation' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'type' => [
                'type' => 'ENUM("SEMI-REMORQUE","REMORQUE","HAMMAR")',
            ],
            'remarque' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'fin_vt' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'fin_as' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey([
            'immatriculation',
            'ancienne_immatriculation',
            'chrono'
        ]);
        $this->forge->createTable('remorques',true);
    }

    public function down()
    {
        $this->forge->dropTable('remorques',true);
    }
}
