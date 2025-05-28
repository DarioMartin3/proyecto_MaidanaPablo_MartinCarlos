<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perfiles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_perfil' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'descripcion' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'baja' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
            ],
        ]);

        $this->forge->addKey('id_perfil', true); // clave primaria
        $this->forge->createTable('perfiles');

        // Insertar registros para que el FK funcione y el valor por defecto sea válido
$db = \Config\Database::connect();
$db->table('perfiles')->insertBatch([
    ['id_perfil' => 1, 'descripcion' => 'Admin', 'baja' => false],
    ['id_perfil' => 2, 'descripcion' => 'Usuario', 'baja' => false], // este es el default en usuarios
]);
    }

    public function down()
    {
        $this->forge->dropTable('perfiles');
    }
}