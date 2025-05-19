<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Productos extends BaseController
{
    public function index()
    {
        echo view('front/header');
        echo view('front/nav');
        echo view('front/agregar_productos');
        echo view('front/footer');
    }
    public function agregar_campos()
    {
        echo view('front/header');
        echo view('front/nav');
        echo view('front/agregar_campos');
        echo view('front/footer');
    }
}
