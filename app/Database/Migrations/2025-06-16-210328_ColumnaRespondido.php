<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ColumnaRespondido extends Migration
{
    public function up()
    {
        $this->forge->addColumn('consultas', [
            'respondido' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ]
        ]);
        
    }

    public function down()
    {
        $this->forge->dropColumn('consultas', 'respondido');
    }
}
