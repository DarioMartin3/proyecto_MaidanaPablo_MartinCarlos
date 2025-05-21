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
        $data = [
                    'nombre' => $this->request->getPost('nombre'),
                    'precio' => $this->request->getPost('precio'),
                    'id_marca' => $this->request->getPost('marca'),
                    'id_color' => $this->request->getPost('color'),
                    'stock' => $this->request->getPost('stock'),
                    'id_talla' => $this->request->getPost('talla'),
                    'id_categoria' => $this->request->getPost('categoria'),
                    'descripcion' => $this->request->getPost('descripcion')
                ];
        $model = new ProductsModel();

        try{
            if($model->insert($data)) {
                return redirect()->to('/agregar_productos')->with('mensaje', 'Producto ingresado correctamente');
            }else{
                return redirect()->back();
            }
        }catch (Exception $e){
            echo "error" . $e->getMessage();
        }
        
    }
}
