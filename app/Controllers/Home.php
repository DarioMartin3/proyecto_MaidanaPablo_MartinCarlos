<?php

namespace App\Controllers;

use App\Models\CategoriasModel;
use App\Models\SexosModel;

class Home extends BaseController
{
    public function index(): void
    {
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->findAll();

        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/homep');
        echo view('front/footer');
    }

    public function qSomos()
    {
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->findAll();
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/quienes_somos');
        echo view('front/footer');
    }

    public function contact() 
    {
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->findAll();
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/contact_info');
        echo view('front/footer');
    }

    public function terms() 
    {
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->findAll();
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/terminos_y_usos');
        echo view('front/footer');
    }

    public function form_pagos(){
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->findAll();
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/formas_de_pago');
        echo view('front/footer');
    }

    public function metodos_env(){
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->findAll();
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/metodos_envios');
        echo view('front/footer');
    }

    public function cam_dev(){
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->findAll();
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/cambios_devoluciones');
        echo view('front/footer');
    }

    public function cPage(){
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->findAll();
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/construction_page');
        echo view('front/footer');
    }

    public function adminMenu(){
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->findAll();
        echo view('front/header');
        echo view('front/nav', $data);
        echo view('front/admin_menu');
        echo view('front/footer');
    }
}




