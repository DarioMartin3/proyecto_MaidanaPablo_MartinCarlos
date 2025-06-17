<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultasModel extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['apellido', 'nombre', 'email', 'telefono', 'consulta', 'respondido'];
    protected $returnType = 'array';
    public $useTimestamps = false;
}
