<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarSexo extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'id_sexo' => [
                'type' => 'integer',
                'constraint' => 1,
                'after' => 'id_talla'
            ]
            
        ]);
        $this->forge->addForeignKey('id_sexo', 'sexos', 'id');
    }

    public function down()
    {
        $this->forge->dropColumn('categorias', 'id_sexo');
    }
}
