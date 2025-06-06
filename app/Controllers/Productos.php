<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;
use App\Models\ColoresModel;
use App\Models\MarcasModel;
use App\Models\ProductsModel;
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
        $data['marcas'] = $modelMarcas->findAll();
        $data['categorias'] = $modelCate->findAll();
        $data['tallas'] = $modelTalla->findAll();
        $data['colores'] = $modelColor->findAll();

        echo view('front/header');
        echo view('front/nav');
        echo view('front/agregar_productos', $data);
        echo view('front/footer');
    }
    public function agregar_campos()
    {
        echo view('front/header');
        echo view('front/nav');
        echo view('front/agregar_campos');
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
            $imagen->move( './assets/uploads', $nuevoNombre);
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'precio' => $this->request->getPost('precio'),
            'id_marca' => $this->request->getPost('marca'),
            'id_color' => $this->request->getPost('color'),
            'stock' => $this->request->getPost('stock'),
            'id_talla' => $this->request->getPost('talla'),
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
        $data['marcas'] = $modelMarcas->findAll();
        $data['categorias'] = $modelCate->findAll();
        $data['tallas'] = $modelTalla->findAll();
        $data['colores'] = $modelColor->findAll();
        $data['productos'] = $model->findAll();
        echo view('front/header');
        echo view('front/nav');
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
            'descripcion' => $this->request->getPost('descripcion')
        ];

        $model->update($id, $data);
        return redirect()->to('/productos')->with('mensaje', 'Producto actualizado correctamente');
    }

    public function catalogo_productos()
    {
        $modelMarcas = new MarcasModel();
        $modelCate = new CategoriasModel();
        $modelTalla = new TallasModel();
        $model = new ProductsModel();
        $data['marcas'] = $modelMarcas->findAll();
        $data['categorias'] = $modelCate->findAll();
        $data['tallas'] = $modelTalla->findAll();
        $data['productos'] = $model->where('estado', 1)->findAll();

        echo view('front/header');
        echo view('front/nav');
        echo view('front/catalogo_productos', $data);
        echo view('front/footer');
    }
}
