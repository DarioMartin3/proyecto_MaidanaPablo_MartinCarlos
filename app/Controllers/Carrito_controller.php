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




        $cart->insert([
            'id'    => $producto['id'],
            'qty'   => $qty,
            'price' => $producto['precio'],
            'name'  => $producto['nombre'],
            'imagen' => isset($producto['nombre_imagen']) && $producto['nombre_imagen'] ? base_url('assets/uploads/' . $producto['nombre_imagen']) : null,
        ]);
        return redirect()->back()->with('mensaje', 'Producto agregado al carrito');
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

    public function actualizar()
    {
        $cart = \Config\Services::cart();
        $rowid = $this->request->getPost('rowid');
        $qty = $this->request->getPost('qty');
        $cart->update([
            'rowid' => $rowid,
            'qty'   => $qty
        ]);
        return redirect()->back()->with('mensaje', 'Carrito actualizado');
    }

    public function eliminar()
    {
        $cart = \Config\Services::cart();
        $rowid = $this->request->getPost('rowid');

        $item = $cart->getItem($rowid);
        if ($item && $item['qty'] > 1) {
            $cart->update([
                'rowid' => $rowid,
                'qty' => $item['qty'] - 1
            ]);
        } else {
            $cart->remove($rowid);
        }
        return redirect()->back()->with('mensaje', 'Se eliminó un producto del carrito');
    }

    public function eliminar_todo()
    {
        $cart = \Config\Services::cart();
        $rowid = $this->request->getPost('rowid');

        $cart->remove($rowid);
        return redirect()->back()->with('mensaje', 'Producto eliminado completamente del carrito');
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

        // Crear detalles de venta y actualizar stock
        $productoModel = new \App\Models\ProductsModel();
        foreach ($cart->contents() as $item) {
            $detalle = [
                'venta_id' => $venta_id,
                'producto_id' => $item['id'],
                'cantidad' => $item['qty'],
                'precio_unitario' => $item['price']
            ];
            $detallesModel->insert($detalle);

            // Actualizar stock y dar de baja si corresponde
            $producto = $productoModel->find($item['id']);
            if ($producto) {
                $nuevoStock = $producto['stock'] - $item['qty'];
                $updateData = ['stock' => $nuevoStock];
                if ($nuevoStock <= 0) {
                    $updateData['estado'] = 0; // o 'activo' según tu campo
                }
                $productoModel->update($item['id'], $updateData);
            }
        }

        $cart->destroy();
        return redirect()->to('/carrito')->with('mensaje', '¡Compra realizada con éxito!');
    }
}
