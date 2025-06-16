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
                'perfil_id'=> 2, 
                'baja'     => 0  
            ];
            $model->insert($data);

            return redirect()-> back()->with('mensaje', 'Usuario registrado correctamente');
        }
    }

    public function lista()
    {
        $usuariosModel = new \App\Models\UsuariosModel();
        $db = \Config\Database::connect();
        $usuarios = $db->table('usuarios')
            ->select('usuarios.*, perfiles.descripcion as perfil')
            ->join('perfiles', 'usuarios.perfil_id = perfiles.id_perfil')
            ->get()->getResultArray();
        echo view('front/header');
        echo view('front/nav');
        echo view('front/user_list', ['usuarios' => $usuarios]);
        echo view('front/footer');
    }

    public function habilitar($id)
    {
        $usuariosModel = new \App\Models\UsuariosModel();
        $usuariosModel->update($id, ['baja' => 0]);
        return redirect()->to('/usuarios')->with('mensaje', 'Usuario habilitado correctamente');
    }

    public function deshabilitar($id)
    {
        $usuariosModel = new \App\Models\UsuariosModel();
        $usuariosModel->update($id, ['baja' => 1]);
        return redirect()->to('/usuarios')->with('mensaje', 'Usuario deshabilitado correctamente');
    }

    public function editar($id)
    {
        $usuariosModel = new \App\Models\UsuariosModel();
        $db = \Config\Database::connect();
        $usuario = $usuariosModel->find($id);
        $perfiles = $db->table('perfiles')->where('baja', 0)->get()->getResultArray();
        if (!$usuario) {
            return redirect()->to('/usuarios')->with('mensaje', 'Usuario no encontrado');
        }
        echo view('front/header');
        echo view('front/nav');
        echo view('front/user_edit', ['usuario' => $usuario, 'perfiles' => $perfiles]);
        echo view('front/footer');
    }

    public function actualizar($id)
    {
        $usuariosModel = new \App\Models\UsuariosModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'perfil_id' => $this->request->getPost('perfil_id'),
        ];
        $usuariosModel->update($id, $data);
        return redirect()->to('/usuarios')->with('mensaje', 'Usuario actualizado correctamente');
    }
}

