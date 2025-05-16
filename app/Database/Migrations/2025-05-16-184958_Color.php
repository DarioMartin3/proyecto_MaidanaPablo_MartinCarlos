<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Color extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'color' => [
                'type' => 'varchar',
                'constraint' => 10
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Colores');
    }

    public function down()
    {
        $this->forge->dropTable('Colores');
    }
}
