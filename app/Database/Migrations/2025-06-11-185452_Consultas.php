<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Consultas extends Migration
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
            'apellido' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],	
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],	
            'consulta' => [
                'type' => 'TEXT',
            ],
            'respondido' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('consultas');
    }


    public function down()
    {
        $this->forge->dropTable('consultas');
    }
}
