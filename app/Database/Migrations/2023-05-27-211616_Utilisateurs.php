<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Utilisateurs extends Migration
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
            'profil' => [
                'type' => 'ENUM("SUPERADMIN","ADMIN","OPS","FACTURATION","GARAGISTE","G. CARBURANT")',
                'null' => true
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'matricule' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'mdp' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addUniqueKey('matricule');
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('utilisateurs',true);
    }

    public function down()
    {
        $this->forge->dropTable('utilisateurs',true);
    }
}
