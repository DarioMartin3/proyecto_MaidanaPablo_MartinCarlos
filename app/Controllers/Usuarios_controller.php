<?php

namespace App\Controllers;

Use CodeIgniter\models\Usuarios_model;
use CodeIgniter\controller;

class Usuarios_controller extends controller
{
    
    public function create(){
        $dato['titulo'] = 'Registro';
        echo view('front/header', $dato);
        echo view('front/navbar');
        echo view('front/footer');
    }

    
}
