<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): void
    {
        echo view('front/header');
        echo view('front/nav');
        echo view('front/homep');
        echo view('front/footer');
    }

    public function qSomos()
    {
        echo view('front/header');
        echo view('front/nav');
        echo view('front/quienes_somos');
        echo view('front/footer');
    }

    public function contact() 
    {
        echo view('front/header');
        echo view('front/nav');
        echo view('front/contact_info');
        echo view('front/footer');
    }

    public function terms() 
    {
        echo view('front/header');
        echo view('front/nav');
        echo view('front/terminos_y_usos');
        echo view('front/footer');
    }

    public function form_pagos(){
        echo view('front/header');
        echo view('front/nav');
        echo view('front/formas_de_pago');
        echo view('front/footer');
    }

    public function metodos_env(){
        echo view('front/header');
        echo view('front/nav');
        echo view('front/metodos_envios');
        echo view('front/footer');
    }

    public function cam_dev(){
        echo view('front/header');
        echo view('front/nav');
        echo view('front/cambios_devoluciones');
        echo view('front/footer');
    }
}




