<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ventas_Cabecera extends Migration
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
            'fecha' => [
                'type' => 'datetime',
                'null' => false
            ],
            'usuario_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'total_venta' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('usuario_id', 'usuarios', 'id_usuario');
        $this->forge->createTable('ventas_cabecera');
    }

    public function down()
    {
        $this->forge->dropTable('ventas_cabecera');
    }
}
