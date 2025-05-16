<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Productos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_incremental' => true
            ],
            'talla' => [
                'type' => 'varchar',
                'constraint' => 10
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('Tallas');
    }

    public function down()
    {
        $this->forge->dropTable('Tallas');
    }
}
