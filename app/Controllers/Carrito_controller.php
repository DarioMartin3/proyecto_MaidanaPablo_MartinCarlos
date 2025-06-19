<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniterCart\Cart;
use App\Models\ProductsModel;

/**
 * Controlador para la gestión del carrito de compras.
 * Permite agregar, mostrar, actualizar, eliminar productos y finalizar la compra.
 */
class Carrito_controller extends BaseController
{
    /**
     * Constructor: carga helpers y servicios necesarios.
     */
    public function __construct()
    {
        helper(['form', 'url', 'cart']);
        $cart = \config\services::cart();
        $session = session();
    }

    /**
     * Agrega un producto al carrito.
     * Obtiene el producto por ID, lo inserta en el carrito y redirige con mensaje.
     */
    public function agregar()
    {
        // Obtener el servicio de carrito
        $cart = \Config\Services::cart();
        // Obtener el ID del producto y la cantidad (por defecto 1)
        $productId = $this->request->getPost('id');
        $qty = $this->request->getPost('qty') ?? 1;

        // Buscar el producto en la base de datos
        $model = new ProductsModel();
        $producto = $model->find($productId);

        // Insertar el producto en el carrito
        $cart->insert([
            'id'    => $producto['id'],
            'qty'   => $qty,
            'price' => $producto['precio'],
            'name'  => $producto['nombre'],
            'imagen' => isset($producto['nombre_imagen']) && $producto['nombre_imagen'] ? base_url('assets/uploads/' . $producto['nombre_imagen']) : null,
        ]);
        // Redirigir con mensaje de éxito
        return redirect()->back()->with('mensaje', 'Producto agregado al carrito');
    }

    /**
     * Muestra el contenido del carrito.
     * Carga las vistas necesarias y pasa los datos del carrito.
     */
    public function mostrar()
    {
        $data = [];
        // Obtener todas las categorías para la navegación
        $nav['categorias'] = (new \App\Models\CategoriasModel())->findAll();
        // Obtener el servicio de carrito
        $cart = \Config\Services::cart();
        // Obtener los productos y el total del carrito
        $data['cartItems'] = $cart->contents();
        $data['cartTotal'] = $cart->total();

        // Cargar las vistas del carrito
        echo view('front/header');
        echo view('front/nav', $nav);
        echo view('front/vista_carrito', $data);
        echo view('front/footer');
    }

    /**
     * Actualiza la cantidad de un producto en el carrito.
     */
    public function actualizar()
    {
        // Obtener el servicio de carrito
        $cart = \Config\Services::cart();
        // Obtener el rowid y la nueva cantidad desde el formulario
        $rowid = $this->request->getPost('rowid');
        $qty = $this->request->getPost('qty');
        // Actualizar la cantidad del producto en el carrito
        $cart->update([
            'rowid' => $rowid,
            'qty'   => $qty
        ]);
        // Redirigir con mensaje de éxito
        return redirect()->back()->with('mensaje', 'Carrito actualizado');
    }

    /**
     * Elimina una unidad de un producto del carrito.
     * Si la cantidad es 1, elimina el producto completamente.
     */
    public function eliminar()
    {
        // Obtener el servicio de carrito
        $cart = \Config\Services::cart();
        // Obtener el rowid del producto a eliminar
        $rowid = $this->request->getPost('rowid');

        // Obtener el producto del carrito
        $item = $cart->getItem($rowid);
        if ($item && $item['qty'] > 1) {
            // Si hay más de una unidad, restar una
            $cart->update([
                'rowid' => $rowid,
                'qty' => $item['qty'] - 1
            ]);
        } else {
            // Si solo queda una, eliminar el producto del carrito
            $cart->remove($rowid);
        }
        // Redirigir con mensaje
        return redirect()->back()->with('mensaje', 'Se eliminó un producto del carrito');
    }

    /**
     * Elimina completamente un producto del carrito.
     */
    public function eliminar_todo()
    {
        // Obtener el servicio de carrito
        $cart = \Config\Services::cart();
        // Obtener el rowid del producto a eliminar
        $rowid = $this->request->getPost('rowid');

        // Eliminar el producto del carrito
        $cart->remove($rowid);
        // Redirigir con mensaje
        return redirect()->back()->with('mensaje', 'Producto eliminado completamente del carrito');
    }

    /**
     * Finaliza la compra: crea la venta, guarda los detalles y actualiza el stock.
     * Si el usuario no está logueado o el carrito está vacío, redirige con error.
     */
    public function finalizar_compra()
    {
        // Obtener el servicio de carrito y la sesión
        $cart = \Config\Services::cart();
        $session = session();
        // Obtener el ID del usuario
        $usuario_id = $session->get('id_usuario');
        // Validar que el usuario esté logueado y el carrito no esté vacío
        if (!$usuario_id || empty($cart->contents())) {
            return redirect()->to('/carrito')->with('error', 'Debes iniciar sesión y tener productos en el carrito.');
        }

        // Instanciar los modelos de cabecera y detalles de venta
        $cabeceraModel = new \App\Models\VentasCabeceraModel();
        $detallesModel = new \App\Models\VentasDetallesModel();

        // Crear cabecera de venta con fecha, usuario y total
        $cabeceraData = [
            'fecha' => date('Y-m-d H:i:s'),
            'usuario_id' => $usuario_id,
            'total_venta' => $cart->total()
        ];
        $cabeceraModel->insert($cabeceraData);
        // Obtener el ID de la venta recién creada
        $venta_id = $cabeceraModel->getInsertID();

        // Crear detalles de venta y actualizar stock
        $productoModel = new \App\Models\ProductsModel();
        foreach ($cart->contents() as $item) {
            // Crear el detalle de la venta para cada producto
            $detalle = [
                'venta_id' => $venta_id,
                'producto_id' => $item['id'],
                'cantidad' => $item['qty'],
                'precio_unitario' => $item['price']
            ];
            $detallesModel->insert($detalle);

            // Actualizar stock y baja logica si se queda sin stock
            // Buscar el producto actual en la base de datos
            $producto = $productoModel->find($item['id']);
            if ($producto) {
                // Calcular el nuevo stock restando la cantidad vendida
                $nuevoStock = $producto['stock'] - $item['qty'];
                // Preparar los datos para actualizar el stock
                $updateData = ['stock' => $nuevoStock];
                // Si el stock llega a 0 o menos, marcar el producto como inactivo (baja lógica)
                if ($nuevoStock <= 0) {
                    $updateData['estado'] = 0;
                }
                // Actualizar el producto en la base de datos con el nuevo stock y estado
                $productoModel->update($item['id'], $updateData);
            }
        }

        // Vaciar el carrito después de la compra
        $cart->destroy();
        // Redirigir con mensaje de éxito
        return redirect()->to('/carrito')->with('mensaje', '¡Compra realizada con éxito!');
    }
}
