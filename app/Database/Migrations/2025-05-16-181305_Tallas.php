<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tallas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'talla' => [
                'type' => 'varchar',
                'constraint' => 10
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tallas');
    }

    public function down()
    {
        $this->forge->dropTable('tallas');
    }
}
