<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConsultasModel;

/**
 * Controlador para la gestión de consultas de usuarios.
 * Permite guardar nuevas consultas, listar todas y cambiar el estado de respondido.
 */
class Consultas_controller extends BaseController
{
    /**
     * Guarda una nueva consulta enviada por el usuario.
     * Inserta los datos recibidos por POST en la base de datos y redirige con mensaje.
     */
    public function guardar()
    {
        // Instanciar el modelo de consultas
        $model = new ConsultasModel();
        // Obtener los datos del formulario
        $data = [
            'apellido'  => $this->request->getPost('apellido'),
            'nombre'    => $this->request->getPost('nombre'),
            'email'     => $this->request->getPost('email'),
            'telefono'  => $this->request->getPost('telefono'),
            'consulta'  => $this->request->getPost('consulta'),
            'respondido' => 0 // Por defecto, la consulta no está respondida
        ];
        // Insertar la consulta en la base de datos
        $model->insert($data);
        // Redirigir con mensaje de éxito
        return redirect()->back()->with('mensaje', 'Consulta enviada correctamente');
    }

    /**
     * Lista todas las consultas, mostrando primero las no respondidas.
     * Carga las vistas necesarias y pasa los datos de las consultas.
     */
    public function lista()
    {
        // Obtener las categorías para la navegación
        $nav['categorias'] = (new \App\Models\CategoriasModel())->findAll();
        // Instanciar el modelo de consultas
        $model = new ConsultasModel();
        // Obtener todas las consultas, ordenando primero las no respondidas
        $data['consultas'] = $model->orderBy('respondido ASC, id DESC')->findAll();
        // Cargar las vistas de la lista de consultas
        echo view('front/header');
        echo view('front/nav', $nav);
        echo view('front/lista_consulta', $data);
        echo view('front/footer');
    }

    /**
     * Cambia el estado de respondido de una consulta (toggle).
     * Si el ID no es válido, redirige con mensaje de error.
     * @param int|null $id ID de la consulta a modificar
     */
    public function cambiar_respondido($id = null)
    {
        // Validar que se haya recibido un ID
        if ($id === null) {
            return redirect()->to('/consulta')->with('mensaje_consultaLista', 'ID de consulta no proporcionado');
        }
        // Instanciar el modelo de consultas
        $model = new ConsultasModel();
        // Buscar la consulta por ID
        $consulta = $model->find($id);
        if ($consulta) {
            // Cambiar el estado de respondido (toggle)
            $nuevoEstado = $consulta['respondido'] ? 0 : 1;
            $model->update($id, ['respondido' => $nuevoEstado]);
            // Redirigir con mensaje de éxito
            return redirect()->to('/consulta')->with('mensaje_consultaLista', 'Estado de respondido actualizado');
        } else {
            // Redirigir con mensaje de error si no se encuentra la consulta
            return redirect()->to('/consulta')->with('mensaje_consultaLista', 'Consulta no encontrada');
        }
    }
}
