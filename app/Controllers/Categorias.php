<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;
use App\Models\ColoresModel;
use App\Models\MarcasModel;
use App\Models\TallasModel;
use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Categorias extends BaseController
{
    public function categoria()
    {
        $datos = ['categoria' => $this->request->getPost('categoria'), 'hombre' => $this->request->getPost('hombre'), 'mujer' => $this->request->getPost('mujer')];
        $model = new CategoriasModel();
        $existe = $model->where('categoria', $datos['categoria'])->first();
        if ($existe) {
            return redirect()->back()->with('campo_error', 'El dato ingresado ya existe.');
        }
        try {
            if ($model->insert($datos)) {
                return redirect()->to('/agregar_campos')->with('mensaje', 'Categoria creada correctamente');
            } else {
                return redirect()->back();
            }
        } catch (Exception $e) {
            echo "datos contiene " . $datos['categoria'];
            echo "error" . $e->getMessage();
        }
    }
    public function marca()
    {
        $datos = ['marca' => $this->request->getPost('marca')];
        $model = new MarcasModel();
        $existe = $model->where('marca', $datos)->first();
        if ($existe) {
            return redirect()->back()->with('campo_error', 'El dato ingresado ya existe.');
        }
        try {
            if ($model->insert($datos)) {
                return redirect()->to('/agregar_campos')->with('mensaje', 'Marca creada correctamente');
            } else {
                return redirect()->back();
            }
        } catch (Exception $e) {
            echo "datos contiene " . $datos['marca'];
            echo "error" . $e->getMessage();
        }
    }
    public function talla()
    {
        $datos = ['talla' => $this->request->getPost('talla')];
        $model = new TallasModel();
        $existe = $model->where('talla', $datos)->first();
        if ($existe) {
            return redirect()->back()->with('campo_error', 'El dato ingresado ya existe.');
        }
        try {
            if ($model->insert($datos)) {
                return redirect()->to('/agregar_campos')->with('mensaje', 'Talla creada correctamente');
            } else {
                return redirect()->back();
            }
        } catch (Exception $e) {
            echo "datos contiene " . $datos['talla'];
            echo "error" . $e->getMessage();
        }
    }
    public function color()
    {
        $datos = ['color' => $this->request->getPost('color')];
        $model = new ColoresModel();
        $existe = $model->where('color', $datos)->first();
        if ($existe) {
            return redirect()->back()->with('campo_error', 'El dato ingresado ya existe.');
        }
        try {
            if ($model->insert($datos)) {
                return redirect()->to('/agregar_campos')->with('mensaje', 'Color creado correctamente');
            } else {
                return redirect()->back();
            }
        } catch (Exception $e) {
            echo "datos contiene " . $datos['color'];
            echo "error" . $e->getMessage();
        }
    }
}
