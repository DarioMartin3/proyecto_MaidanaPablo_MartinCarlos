<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_categoria' => [
                'type' => 'int'
            ],
            'estado' => [
                'type' => 'varchar',
                'constraint' => 10
            ],
            'nombre' => [
                'type' => 'varchar',
                'constraint' => 50
            ],
            'descripcion' => [
                'type' => 'text'
            ],
            'id_talla' => [
                'type' => 'int'
            ],
            'stock' => [
                'type' => 'int'
            ],
            'precio' => [
                'type' => 'float'
            ],
            'id_marca' => [
                'type' => 'int'
            ],
            'id_color' => [
                'type' => 'int'
            ]
        ]); 
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_categoria', 'Categorias', 'id');
        $this->forge->addForeignKey('id_talla', 'Tallas', 'id');
        $this->forge->addForeignKey('id_marca', 'Marcas', 'id');
        $this->forge->addForeignKey('id_color', 'Colores', 'id');
        $this->forge->createTable('Products');
    }

    public function down()
    {
        $this->forge->dropTable('Products');
    }
}
