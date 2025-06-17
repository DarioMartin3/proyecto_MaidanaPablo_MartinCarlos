<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarSexoCat extends Migration
{
    public function up()
    {
        $this->forge->addColumn('categorias', [
            'hombre' => [
                'type' => 'integer',
                'constraint' => 1,
                'default' => 0,
                'after' => 'categoria'
            ],
            'mujer' => [
                'type' => 'integer',
                'constraint' => 1,
                'default' => 0,
                'after' => 'categoria'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('categorias', 'hombre');
        $this->forge->dropColumn('categorias', 'mujer');
    }
}
