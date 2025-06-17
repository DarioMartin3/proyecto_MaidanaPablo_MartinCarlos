<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sexos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'sexo' => [
                'type' => 'varchar',
                'constraint' => '15'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('sexos');
    }

    public function down()
    {
        $this->forge->dropTable('sexos');
    }
}
