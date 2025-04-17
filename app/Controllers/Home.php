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
}




