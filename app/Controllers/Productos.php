<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;
use App\Models\ColoresModel;
use App\Models\MarcasModel;
use App\Models\ProductsModel;
use App\Models\SexosModel;
use App\Models\TallasModel;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Productos extends BaseController
{
    public function index()
    {
        $modelMarcas = new MarcasModel();
        $modelCate = new CategoriasModel();
        $modelTalla = new TallasModel();
        $modelColor = new ColoresModel();
        $sexos = new SexosModel();
        $data['sexos'] = $sexos->findAll();
        $data['marcas'] = $modelMarcas->findAll();
        $data['categorias'] = $modelCate->findAll();
        $data['tallas'] = $modelTalla->findAll();
        $data['colores'] = $modelColor->findAll();
        $nav['categorias'] = $modelCate->findAll();

        // Cargar datos del carrito en $data, no en $nav
        $cart = \Config\Services::cart();
        $data['cartItems'] = $cart->contents();
        $data['cartTotal'] = $cart->total();
        $data['cartCount'] = 0;
        foreach ($data['cartItems'] as $item) {
            $data['cartCount'] += $item['qty'];
        }
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/agregar_productos', $data);
        echo view('front/footer');
    }
    public function agregar_campos()
    {
        $modelCate = new CategoriasModel();
        $nav['categorias'] = $modelCate->findAll();
        $sexos = new SexosModel();
        $data['sexos'] = $sexos->findAll();

        // Cargar datos del carrito en $data, no en $nav
        $cart = \Config\Services::cart();
        $data['cartItems'] = $cart->contents();
        $data['cartTotal'] = $cart->total();
        $data['cartCount'] = 0;
        foreach ($data['cartItems'] as $item) {
            $data['cartCount'] += $item['qty'];
        }
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/agregar_campos', $data);
        echo view('front/footer');
    }

    public function agrega_producto()
    {
        $rules = [
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,2048]'
            ]
        ];
        $imagen = $this->request->getFile('imagen');
        $nuevoNombre = $imagen->getRandomName();
        if ($imagen->isValid() && !$imagen->hasMoved()) {
            $imagen->move('./assets/uploads', $nuevoNombre);
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'precio' => $this->request->getPost('precio'),
            'id_marca' => $this->request->getPost('marca'),
            'id_color' => $this->request->getPost('color'),
            'stock' => $this->request->getPost('stock'),
            'id_talla' => $this->request->getPost('talla'),
            'id_sexo' => $this->request->getPost('sexo'),
            'id_categoria' => $this->request->getPost('categoria'),
            'descripcion' => $this->request->getPost('descripcion'),
            'nombre_imagen' => $nuevoNombre,
            'estado' => 1
        ];
        $model = new ProductsModel();

        try {
            if ($model->insert($data)) {
                return redirect()->to('/agregar_productos')->with('mensaje', 'Producto ingresado correctamente');
            } else {
                return redirect()->back();
            }
        } catch (Exception $e) {
            echo "error" . $e->getMessage();
        }
    }

    public function lista()
    {
        $modelMarcas = new MarcasModel();
        $modelCate = new CategoriasModel();
        $modelTalla = new TallasModel();
        $modelColor = new ColoresModel();
        $model = new ProductsModel();
        $modelSexos = new SexosModel();
        $data['marcas'] = $modelMarcas->findAll();
        $data['categorias'] = $modelCate->findAll();
        $data['tallas'] = $modelTalla->findAll();
        $data['colores'] = $modelColor->findAll();
        $productos = $model->findAll();
        $data['productos_habilitados'] = array_filter($productos, function ($p) {
            return $p['estado'];
        });
        $data['productos_deshabilitados'] = array_filter($productos, function ($p) {
            return !$p['estado'];
        });
        $data['productos'] = $model->findAll();
        $data['sexos'] = $modelSexos->findAll();
        $nav['categorias'] = $modelCate->findAll();

        // Cargar datos del carrito en $data, no en $nav
        $cart = \Config\Services::cart();
        $data['cartItems'] = $cart->contents();
        $data['cartTotal'] = $cart->total();
        $data['cartCount'] = 0;
        foreach ($data['cartItems'] as $item) {
            $data['cartCount'] += $item['qty'];
        }
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/product_list', $data);
        echo view('front/footer');
    }

    public function deshabilitar($id)
    {
        $model = new ProductsModel();
        $model->update($id, ['estado' => 0]);
        return redirect()->back()->with('mensaje', 'Producto deshabilitado');
    }

    public function habilitar($id)
    {
        $model = new ProductsModel();
        $model->update($id, ['estado' => 1]);
        return redirect()->back()->with('mensaje', 'Producto habilitado');
    }

    public function actualizar($id)
    {
        $model = new ProductsModel();


        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'id_categoria' => $this->request->getPost('categoria'),
            'id_talla' => $this->request->getPost('talla'),
            'stock' => $this->request->getPost('stock'),
            'precio' => $this->request->getPost('precio'),
            'id_marca' => $this->request->getPost('marca'),
            'id_color' => $this->request->getPost('color'),
            'descripcion' => $this->request->getPost('descripcion'),
            'id_sexo' => $this->request->getPost('sexo')
        ];

        $model->update($id, $data);
        return redirect()->to('/productos')->with('mensaje', 'Producto actualizado correctamente');
    }

    public function catalogo_productos()
    {
        $marcas = $this->request->getGet('marca') ?? [];
        $categorias = $this->request->getGet('categorias') ?? [];
        $tallas = $this->request->getGet('talla') ?? [];
        $colores = $this->request->getGet('color') ?? [];
        $sexos = $this->request->getGet('sexo') ?? [];

        $modelMarcas = new MarcasModel();
        $modelCate = new CategoriasModel();
        $modelTalla = new TallasModel();
        $model = new ProductsModel();

        if (!empty($marcas)) {
            $model->whereIn('id_marca', $marcas);
        }

        if (!empty($categorias)) {
            $model->whereIn('id_categoria', $categorias);
        }

        if (!empty($colores)) {
            $model->whereIn('id_color', $colores);
        }
        if (!empty($sexos)) {
            $model->whereIn('id_sexo', $sexos);
        }

        if (!empty($tallas)) {
            $model->whereIn('id_talla', $tallas);
            #producto_talla.
            #join('producto_talla', 'products.id = producto_talla.id_producto')

            # ->groupBy('productos.id'); // Importante para evitar duplicados
        }

        $data['marcas'] = $modelMarcas->findAll();
        $data['categorias'] = $modelCate->findAll();
        $data['tallas'] = $modelTalla->findAll();
        $data['productos'] = $model->where('estado', 1)->findAll();
        $data['colores'] = (new ColoresModel())->findAll();
        $data['sexos'] = (new SexosModel())->findAll();
        $nav['categorias'] = $modelCate->findAll();

        // Cargar datos del carrito en $data, no en $nav
        $cart = \Config\Services::cart();
        $data['cartItems'] = $cart->contents();
        $data['cartTotal'] = $cart->total();
        $data['cartCount'] = 0;
        foreach ($data['cartItems'] as $item) {
            $data['cartCount'] += $item['qty'];
        }
        $data['categorias'] = $modelCate->findAll();
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/catalogo_productos', $data);
        echo view('front/footer');
    }

    public function detalle_producto($id)
    {
        $model = new ProductsModel();
        $producto['producto'] = $model->find($id);
        $colorModel = new ColoresModel();
        $producto['color'] = $colorModel->find($producto['producto']['id_color']);
        $tallaModel = new TallasModel();
        $producto['talla'] = $tallaModel->find($producto['producto']['id_talla']);
        $marcaModel = new MarcasModel();
        $producto['marca'] = $marcaModel->find($producto['producto']['id_marca']);

        if (!$producto) {
            return redirect()->to('/catalogo')->with('error', 'Producto no encontrado');
        }

        $nav['categorias'] = (new CategoriasModel())->findAll();

        echo view('front/header');
        echo view('front/nav', $nav);
        echo view('front/detalle_producto', $producto);
        echo view('front/footer');
    }
}
