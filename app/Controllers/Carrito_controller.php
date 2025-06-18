<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniterCart\Cart;
use App\Models\ProductsModel;

class Carrito_controller extends BaseController
{

    public function __construct()
    {
        helper(['form', 'url', 'cart']);
        $cart = \config\services::cart();
        $session = session();
    }

    public function agregar()
    {
        $cart = \Config\Services::cart();
        $productId = $this->request->getPost('id');
        $qty = $this->request->getPost('qty') ?? 1;

        $model = new ProductsModel();
        $producto = $model->find($productId);

        if ($producto) {
            $cart->insert([
                'id'    => $producto['id'],
                'qty'   => $qty,
                'price' => $producto['precio'],
                'name'  => $producto['nombre'],
                //'imagen' => $producto['imagen'],

            ]);
            return redirect()->back()->with('mensaje', 'Producto agregado al carrito');
        } else {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }
    }

    public function mostrar()
    {
        $data = [];
        $data['categorias'] = (new \App\Models\CategoriasModel())->findAll();
        $cart = \Config\Services::cart();
        $data['cartItems'] = $cart->contents();
        $data['cartTotal'] = $cart->total();

        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/vista_carrito', $data);
        echo view('front/footer');
    }

    public function vaciar()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->back()->with('mensaje', 'Carrito vaciado');
    }

    public function actualizar()
    {
        $cart = \Config\Services::cart();
        $rowid = $this->request->getPost('rowid');
        $qty = $this->request->getPost('qty');
        if ($rowid && $qty !== null) {
            $cart->update([
                'rowid' => $rowid,
                'qty'   => $qty
            ]);
            return redirect()->back()->with('mensaje', 'Carrito actualizado');
        } else {
            return redirect()->back()->with('error', 'Datos inválidos para actualizar el carrito');
        }
    }

    public function eliminar()
    {
        $cart = \Config\Services::cart();
        $rowid = $this->request->getPost('rowid');
        if ($rowid) {
            $cart->remove($rowid);
            return redirect()->back()->with('mensaje', 'Producto eliminado del carrito');
        } else {
            return redirect()->back()->with('error', 'No se pudo eliminar el producto');
        }
    }

    public function eliminar_todo()
    {
        $cart = \Config\Services::cart();
        $rowid = $this->request->getPost('rowid');
        if ($rowid) {
            $cart->remove($rowid);
            return redirect()->back()->with('mensaje', 'Producto eliminado completamente del carrito');
        } else {
            return redirect()->back()->with('error', 'No se pudo eliminar el producto');
        }
    }

    public function finalizar_compra()
    {
        $cart = \Config\Services::cart();
        $session = session();
        $usuario_id = $session->get('id_usuario');
        if (!$usuario_id || empty($cart->contents())) {
            return redirect()->to('/carrito')->with('error', 'Debes iniciar sesión y tener productos en el carrito.');
        }

        $cabeceraModel = new \App\Models\VentasCabeceraModel();
        $detallesModel = new \App\Models\VentasDetallesModel();

        // Crear cabecera de venta
        $cabeceraData = [
            'fecha' => date('Y-m-d H:i:s'),
            'usuario_id' => $usuario_id,
            'total_venta' => $cart->total()
        ];
        $cabeceraModel->insert($cabeceraData);
        $venta_id = $cabeceraModel->getInsertID();

        // Crear detalles de venta
        foreach ($cart->contents() as $item) {
            $detalle = [
                'venta_id' => $venta_id,
                'producto_id' => $item['id'],
                'cantidad' => $item['qty'],
                'precio_unitario' => $item['price']
            ];
            $detallesModel->insert($detalle);
        }

        $cart->destroy();
        return redirect()->to('/carrito')->with('mensaje', '¡Compra realizada con éxito!');
    }
}
