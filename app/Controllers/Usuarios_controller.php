<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use CodeIgniter\Controller;

class Usuarios_controller extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function create()
    {
        $dato['titulo'] = 'Registro';
        echo view('front/header', $dato);
        echo view('front/navbar');
        echo view('front/homep');
        echo view('front/footer');
    }

    public function formValidation()
    {
        $validation = \Config\Services::validation();

        $input = $this->validate([
            'nombre'   => 'required|min_length[3]|max_length[25]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario'  => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass'     => 'required|min_length[3]|max_length[10]'
        ]);

        if (!$input) {
            // Si la validación falla, redirige con errores
            return redirect()->back()->withInput()->with('validation', $validation);
        } else {
            // Si la validación es exitosa, guarda el usuario
            $model = new UsuariosModel();
            $data = [
                'apellido' => $this->request->getPost('apellido'),
                'nombre'   => $this->request->getPost('nombre'),
                'usuario'  => $this->request->getPost('usuario'),
                'email'    => $this->request->getPost('email'),
                'pass'     => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
                'perfil_id'=> 2, // o el valor por defecto que uses
                'baja'     => 0  // o el valor por defecto que uses
            ];
            $model->insert($data);

            return redirect()->to('/')->with('mensaje', 'Usuario registrado correctamente');
        }
    }
}

