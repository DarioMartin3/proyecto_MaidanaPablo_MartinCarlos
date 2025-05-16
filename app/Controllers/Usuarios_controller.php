<?php

namespace App\Controllers;

Use CodeIgniter\Models\UsuariosModel;
use CodeIgniter\Controller;

class Usuarios_controller extends controller
{
    
    public function __contruct(){
        helper(['form', 'url']);
    }
    public function create(){
        $dato['titulo'] = 'Registro';
        echo view('front/header', $dato);
        echo view('front/navbar');
        echo view('front/homep');
        echo view('front/footer');
    }

    public function formValidation(){
        
        $input = $this->validate([
            'nombre' => 'required|min_length[3]|max_length[25]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario' => 'required|min_length[3]|max_length[25]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass' => 'required|min_length[3]|max_length[10]'
        ],
    );
    
    }
    
    

}

