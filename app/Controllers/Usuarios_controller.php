<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use CodeIgniter\Controller;

/**
 * Controlador para la gestión de usuarios.
 * Permite registrar, listar, editar, habilitar y deshabilitar usuarios.
 */
class Usuarios_controller extends Controller
{
    /**
     * Constructor: carga helpers necesarios.
     */
    public function __construct()
    {
        helper(['form', 'url']);
    }

    /**
     * Valida y registra un nuevo usuario desde un formulario.
     * Si la validación falla, redirige con errores.
     * Si es exitosa, guarda el usuario y muestra mensaje.
     */
    public function formValidation()
    {
        // Obtener el servicio de validación
        $validation = \Config\Services::validation();

        // Validar los datos del formulario
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]|max_length[25]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario'  => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass'     => 'required|min_length[3]|max_length[200]'
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
                'perfil_id' => 2, // Usuario cliente por defecto
                'baja'     => 0
            ];
            $model->insert($data);

            // Redirigir con mensaje de éxito
            return redirect()->back()->with('mensaje', 'Usuario registrado correctamente');
        }
    }

    /**
     * Lista todos los usuarios y muestra la vista correspondiente.
     */
    public function lista()
    {
        // Obtener las categorías para la navegación
        $nav['categorias'] = (new \App\Models\CategoriasModel())->findAll();
        // Instanciar el modelo de usuarios y la base de datos
        $usuariosModel = new \App\Models\UsuariosModel();
        $db = \Config\Database::connect();
        // Obtener los usuarios y su perfil
        $usuarios = $db->table('usuarios')
            ->select('usuarios.*, perfiles.descripcion as perfil')
            ->join('perfiles', 'usuarios.perfil_id = perfiles.id_perfil')
            ->get()->getResultArray();
        // Cargar las vistas de la lista de usuarios
        echo view('front/header');
        echo view('front/nav', $nav);
        echo view('front/user_list', ['usuarios' => $usuarios]);
        echo view('front/footer');
    }

    /**
     * Habilita un usuario (baja = 0).
     * @param int $id ID del usuario a habilitar
     */
    public function habilitar($id)
    {
        // Actualizar el estado del usuario a habilitado
        $usuariosModel = new \App\Models\UsuariosModel();
        $usuariosModel->update($id, ['baja' => 0]);
        // Redirigir con mensaje
        return redirect()->to('/usuarios')->with('mensaje', 'Usuario habilitado correctamente');
    }

    /**
     * Deshabilita un usuario (baja = 1).
     * @param int $id ID del usuario a deshabilitar
     */
    public function deshabilitar($id)
    {
        // Actualizar el estado del usuario a deshabilitado
        $usuariosModel = new \App\Models\UsuariosModel();
        $usuariosModel->update($id, ['baja' => 1]);
        // Redirigir con mensaje
        return redirect()->to('/usuarios')->with('mensaje', 'Usuario deshabilitado correctamente');
    }

    /**
     * Muestra el formulario de edición de usuario.
     * @param int $id ID del usuario a editar
     */
    public function editar($id)
    {
        // Obtener las categorías para la navegación
        $nav['categorias'] = (new \App\Models\CategoriasModel())->findAll();
        // Instanciar el modelo de usuarios y la base de datos
        $usuariosModel = new \App\Models\UsuariosModel();
        $db = \Config\Database::connect();
        // Buscar el usuario y los perfiles activos
        $usuario = $usuariosModel->find($id);
        $perfiles = $db->table('perfiles')->where('baja', 0)->get()->getResultArray();
        if (!$usuario) {
            // Si no se encuentra el usuario, redirige con mensaje
            return redirect()->to('/usuarios')->with('mensaje', 'Usuario no encontrado');
        }
        // Cargar las vistas de edición
        echo view('front/header');
        echo view('front/nav', $nav);
        echo view('front/user_edit', ['usuario' => $usuario, 'perfiles' => $perfiles]);
        echo view('front/footer');
    }

    /**
     * Actualiza el perfil de un usuario.
     * @param int $id ID del usuario a actualizar
     */
    public function actualizar($id)
    {
        // Actualizar el perfil del usuario
        $usuariosModel = new \App\Models\UsuariosModel();
        $data = [
            'perfil_id' => $this->request->getPost('perfil_id'),
        ];
        $usuariosModel->update($id, $data);
        // Redirigir con mensaje
        return redirect()->to('/usuarios')->with('mensaje', 'Perfil de usuario actualizado correctamente');
    }

    /**
     * Da de alta un nuevo usuario desde el panel de administración.
     * Si la validación falla, redirige con errores.
     * Si es exitosa, guarda el usuario y muestra mensaje.
     */
    public function alta()
    {
        // Si la petición es POST, procesa el alta
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $input = $this->validate([
                'nombre'   => 'required|min_length[3]|max_length[25]',
                'apellido' => 'required|min_length[3]|max_length[25]',
                'usuario'  => 'required|min_length[3]|max_length[25]',
                'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
                'pass'     => 'required|min_length[3]|max_length[200]'
            ]);
            if (!$input) {
                // Si la validación falla, redirige con errores
                return redirect()->back()->withInput()->with('validation', $validation);
            }
            // Si la validación es exitosa, guarda el usuario
            $model = new UsuariosModel();
            $data = [
                'apellido' => $this->request->getPost('apellido'),
                'nombre'   => $this->request->getPost('nombre'),
                'usuario'  => $this->request->getPost('usuario'),
                'email'    => $this->request->getPost('email'),
                'pass'     => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
                'perfil_id' => 2, // Siempre usuario
                'baja'     => 0
            ];
            $model->insert($data);
            // Redirigir con mensaje de éxito
            return redirect()->to('/usuarios')->with('mensaje', 'Usuario registrado correctamente');
        }
        // Si no es POST, redirige a la lista
        return redirect()->to('/usuarios');
    }
}
