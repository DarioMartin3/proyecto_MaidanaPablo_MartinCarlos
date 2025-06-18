<?php
// Controlador para mostrar la lista de ventas
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VentasCabeceraModel;
use App\Models\UsuariosModel;

class Ventas_controller extends BaseController
{
    public function lista()
    {
        $ventasModel = new VentasCabeceraModel();
        $categoria['categorias'] = (new \App\Models\CategoriasModel())->findAll();
        $ventas = $ventasModel
            ->select('ventas_cabecera.id, ventas_cabecera.fecha, ventas_cabecera.total_venta, usuarios.nombre, usuarios.apellido, usuarios.email')
            ->join('usuarios', 'usuarios.id_usuario = ventas_cabecera.usuario_id')
            ->orderBy('ventas_cabecera.id', 'DESC')
            ->findAll();
        $data = ['ventas' => $ventas];
        echo view('front/header');
        echo view('front/nav', $categoria);
        echo view('front/lista_ventas', $data);
        echo view('front/footer');
    }
}
