<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/quienes_somos', 'Home::qSomos');

$routes->get('/contact_info', 'Home::contact');

$routes->get('/terminos_y_usos', 'Home::terms');

$routes->get('/formas_de_pagos', 'Home::form_pagos');

$routes->get('/metodos_de_envios', 'Home::metodos_env');

$routes->get('/cambios_y_devoluciones', 'Home::cam_dev');

$routes->get('/construction_page', 'Home::cPage');

$routes->get('/agregar_productos', 'Productos::index');

$routes->get('/agregar_campos', 'Productos::agregar_campos');

$routes->POST('/categoria', 'Categorias::categoria');

$routes->POST('/marca', 'Categorias::marca');

$routes->POST('/talla', 'Categorias::talla');

$routes->POST('/color', 'Categorias::color');

$routes->POST('/ingresar_producto', 'Productos::agrega_producto');

$routes->post('/enviar-form', 'Usuarios_controller::formValidation');

$routes->get('/dashboard', 'Dashboard::index', ['filter'=>'auth']);

$routes->post('/enviarlogin', 'login_controller::auth');

$routes->get('/logout', 'Login_controller::logout');

$routes->post('/login', 'Login_controller::auth');


