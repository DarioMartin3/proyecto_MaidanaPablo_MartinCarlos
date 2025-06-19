<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use CodeIgniter\Controller;

/**
 * Controlador para la autenticación de usuarios.
 * Permite iniciar y cerrar sesión.
 */
class Login_controller extends Controller
{
    /**
     * Autentica al usuario con email y contraseña.
     * Si las credenciales son correctas y el usuario no está dado de baja, inicia sesión.
     * Si hay error, muestra el mensaje correspondiente.
     */
    public function auth()
    {
        // Obtener la sesión y el modelo de usuarios
        $session = session();
        $model = new UsuariosModel();

        // Obtener los datos del formulario
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Buscar el usuario por email
        $data = $model->where('email', $email)->first();

        if ($data) {
            // Obtener el hash de la contraseña
            $pass = $data['pass'];
            // Verificar la contraseña ingresada
            $verify_pass = password_verify($password, $pass);
            // Verificar si el usuario está dado de baja
            $ba = $data['baja'];
            if ($ba == 'SI' || $ba == 1) {
                $session->setFlashdata('error', 'Usuario dado de baja');
                return redirect()->back();
            }

            if ($verify_pass) {
                // Si la contraseña es correcta, guardar los datos en sesión
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

                // Mensaje de bienvenida
                session()->setFlashdata('success', 'Bienvenido');
                return redirect()->back();
            } else {
                // Contraseña incorrecta
                session()->setFlashdata('error', 'Contraseña incorrecta');
                return redirect()->back();
            }
        } else {
            // Usuario no existe
            session()->setFlashdata('error', 'El usuario no existe');
            return redirect()->back();
        }
    }

    /**
     * Cierra la sesión del usuario y redirige al inicio.
     */
    public function logout()
    {
        // Destruir la sesión
        session()->destroy();
        // Redirigir al home
        return redirect()->to('/');
    }
}
