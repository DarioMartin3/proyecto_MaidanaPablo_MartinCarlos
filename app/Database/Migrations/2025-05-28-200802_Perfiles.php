<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perfiles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_perfil' => [
                'type'           => 'INT',
                'constraint'     => 1,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'descripcion' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'baja' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
            ],
        ]);

        $this->forge->addKey('id_perfil', true); // clave primaria
        $this->forge->createTable('perfiles');
    }

    public function down()
    {
        $this->forge->dropTable('perfiles');
    }
}