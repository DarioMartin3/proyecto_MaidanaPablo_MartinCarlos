<?php

namespace App\Models;

use CodeIgniter\Model;

class VentasDetallesModel extends Model
{
    protected $table = 'ventas_detalles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['venta_id', 'producto_id', 'cantidad', 'precio_unitario'];
    protected $returnType = 'array';
    public $timestamps = false;
}
