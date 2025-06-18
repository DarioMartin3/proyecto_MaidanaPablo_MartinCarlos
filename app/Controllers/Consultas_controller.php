<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConsultasModel;

class Consultas_controller extends BaseController
{
    public function guardar()
    {
        $model = new ConsultasModel();
        $data = [
            'apellido'  => $this->request->getPost('apellido'),
            'nombre'    => $this->request->getPost('nombre'),
            'email'     => $this->request->getPost('email'),
            'telefono'  => $this->request->getPost('telefono'),
            'consulta'  => $this->request->getPost('consulta'),
            'respondido' => 0
        ];
        $model->insert($data);
        return redirect()->back()->with('mensaje', 'Consulta enviada correctamente');
    }

    public function lista()
    {
        $nav['categorias'] = (new \App\Models\CategoriasModel())->findAll();
        $model = new ConsultasModel();
        // Ordenar: primero los no respondidos, luego los respondidos
        $data['consultas'] = $model->orderBy('respondido ASC, id DESC')->findAll();
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
        echo view('front/lista_consulta', $data);
        echo view('front/footer');
    }




    public function cambiar_respondido($id = null)
    {
        if ($id === null) {
            return redirect()->to('/consulta')->with('mensaje_consultaLista', 'ID de consulta no proporcionado');
        }
        $model = new ConsultasModel();
        $consulta = $model->find($id);
        if ($consulta) {
            $nuevoEstado = $consulta['respondido'] ? 0 : 1;
            $model->update($id, ['respondido' => $nuevoEstado]);
            return redirect()->to('/consulta')->with('mensaje_consultaLista', 'Estado de respondido actualizado');
        } else {
            return redirect()->to('/consulta')->with('mensaje_consultaLista', 'Consulta no encontrada');
        }
    }
}
