<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tracteurs extends Migration
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
                'null' => true,
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
            'marque' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'chassis' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'modele' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
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
            'fin_cats' => [
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
        $this->forge->addKey('chassis');
        $this->forge->createTable('tracteurs',true);
    }

    public function down()
    {
        $this->forge->dropTable('tracteurs',true);
    }
}
