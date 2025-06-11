<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ventas_Detalles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'venta_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'producto_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'cantidad' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ],
            'precio_unitario' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('venta_id', 'ventas_cabecera', 'id');
        $this->forge->addForeignKey('producto_id', 'products', 'id');
        $this->forge->createTable('ventas_detalles');
    }

    public function down()
    {
        $this->forge->dropTable('ventas_detalles');
    }
}
