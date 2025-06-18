<?php

namespace App\Controllers;

use App\Models\VentasCabeceraModel;
use App\Models\VentasDetallesModel;
use App\Models\ProductsModel;
use CodeIgniter\Controller;

class Compras_controller extends Controller
{
    public function lista()
    {
        $nav['categorias'] = (new \App\Models\CategoriasModel())->findAll();
        $session = session();
        $usuario_id = $session->get('id_usuario');

        $ventasModel = new VentasCabeceraModel();
        $detallesModel = new VentasDetallesModel();
        $productosModel = new ProductsModel();
        $ventas = $ventasModel
            ->where('usuario_id', $usuario_id)
            ->orderBy('fecha', 'DESC')
            ->findAll();
        // Para cada compra, obtener los detalles y productos
        foreach ($ventas as &$compra) {
            $detalles = $detallesModel->where('venta_id', $compra['id'])->findAll();
            foreach ($detalles as &$detalle) {
                $producto = $productosModel->find($detalle['producto_id']);
                $detalle['nombre_producto'] = $producto ? $producto['nombre'] : 'Producto eliminado';
            }
            $compra['detalles'] = $detalles;
        }
        $data = ['compras' => $ventas];
        echo view('front/header');
        echo view('front/nav', $nav);
        echo view('front/lista_compras', $data);
        echo view('front/footer');
    }
}
