<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use CodeIgniter\Controller;

class Login_controller extends Controller
{
    public function auth()
    {
        $session = session();
        $model = new UsuariosModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $model->where('email', $email)->first();
       
        if ($data) {
            $pass = $data['pass'];
            $verify_pass = password_verify($password, $pass);
            $ba = $data['baja'];
            if ($ba == 'SI' || $ba == 1) {
                $session->setFlashdata('error', 'Usuario dado de baja');
                return redirect()->back();
            }

            if ($verify_pass) {
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre'     => $data['nombre'],
                    'apellido'   => $data['apellido'],
                    'email'      => $data['email'],
                    'usuario'    => $data['usuario'],
                    'perfil_id'  => $data['perfil_id'],
                    'logged_in'  => TRUE
                ];

                $session->set($ses_data);

                session()->setFlashdata('success', 'Bienvenido');
                return redirect()->back();
            } else {
                session()->setFlashdata('error', 'Contraseña incorrecta');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'El usuario no existe');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}