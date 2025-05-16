<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Marcas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'marca' => [
                'type' => 'varchar',
                'constraint' => 20
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('marcas');
    }

    public function down()
    {
        $this->forge->dropTable('marcas');
    }
}
