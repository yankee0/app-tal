<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Livraisons extends Migration
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
            'date_depot_bl' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'date_livraison' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'conteneur' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'armateur' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'type_tc' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tracteur' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'chauffeur_aller' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'mvt_aller' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'adresse' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'zone' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'client' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'date_retour' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'chauffeur_retour' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'mvt_retour' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'date_validite' => [
                'type' => 'DATE',
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
        $this->forge->addKey('chauffeur_retour');
        $this->forge->addKey('tracteur');
        $this->forge->createTable('livraisons', true);
    }

    public function down()
    {
        $this->forge->dropTable('livraisons', true);
    }
}
