<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Export extends Migration
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
            'date_posit' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'conteneur' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'client' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'mv_aller' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'lieu_posit' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'type_posit' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'camion_aller' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'remorque' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'date_retour' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'camion_retour' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'mv_retour' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'remarques' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'chauffeur_aller' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'chauffeur_retour' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('chauffeur_aller');
        $this->forge->addKey('camion_aller');
        $this->forge->addKey('remorque');
        $this->forge->addKey('chauffeur_retour');
        $this->forge->addKey('camion_retour');
        $this->forge->createTable('exports', true);
    }

    public function down()
    {
        $this->forge->dropTable('exports', true);
    }
}
