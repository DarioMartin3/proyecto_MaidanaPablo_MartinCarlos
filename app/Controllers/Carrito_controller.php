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
        $cart = new Cart();
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
                'imagen' => $producto['imagen'],
                
            ]);
            return redirect()->back()->with('mensaje', 'Producto agregado al carrito');
        } else {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }
    }

    public function mostrar()
    {
        $cart = new Cart();
        $data['cartItems'] = $cart->contents();
        $data['cartTotal'] = $cart->total();
        return view('front/nav', $data); // O la vista donde quieras mostrar el carrito
    }

    public function vaciar()
    {
        $cart = new Cart();
        $cart->destroy();
        return redirect()->back()->with('mensaje', 'Carrito vaciado');
    }

    public function actualizar()
    {
        $cart = new Cart();
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
}
