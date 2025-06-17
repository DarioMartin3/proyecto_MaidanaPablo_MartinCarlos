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
                'type' => 'int',
                'unsigned' => true
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
                'type' => 'int',
                'unsigned' => true
            ],
            'stock' => [
                'type' => 'int',
                'unsigned' => true
            ],
            'precio' => [
                'type' => 'float'
            ],
            'id_marca' => [
                'type' => 'int',
                'unsigned' => true
            ],
            'id_color' => [
                'type' => 'int',
                'unsigned' => true                
            ]
        ]); 
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_categoria', 'categorias', 'id');
        $this->forge->addForeignKey('id_talla', 'tallas', 'id');
        $this->forge->addForeignKey('id_marca', 'marcas', 'id');
        $this->forge->addForeignKey('id_color', 'colores', 'id');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
