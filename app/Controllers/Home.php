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

    public function qSomos(): string
    {
        return view('quienes_somos');
    }

    public function contact(): string
    {
        return view('front/contact_info');
    }
}




