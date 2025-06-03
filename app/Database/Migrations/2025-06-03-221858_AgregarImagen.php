<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarImagen extends Migration
{
    public function up()
    {
        // Agregar la columna 'nombre_imagen' a la tabla 'productos'
        $this->forge->addColumn('products', [
            'nombre_imagen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'descripcion'
            ]
        ]);

        
    }

    public function down()
    {
        $this->forge->dropColumn('products', 'nombre_imagen');
    }
}
