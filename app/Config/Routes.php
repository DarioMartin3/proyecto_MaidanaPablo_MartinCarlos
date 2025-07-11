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

$routes->get('/agregar_productos', 'Productos::index', ['filter' => 'auth']);

$routes->get('/agregar_campos', 'Productos::agregar_campos');

$routes->POST('/categoria', 'Categorias::categoria', ['filter' => 'auth']);

$routes->POST('/marca', 'Categorias::marca');

$routes->POST('/talla', 'Categorias::talla');

$routes->POST('/color', 'Categorias::color');

$routes->POST('/ingresar_producto', 'Productos::agrega_producto', ['filter' => 'auth']);

$routes->post('/enviar-form', 'Usuarios_controller::formValidation');

$routes->post('/enviarlogin', 'login_controller::auth');

$routes->get('/logout', 'Login_controller::logout');

$routes->post('/login', 'Login_controller::auth');

$routes->get('/admin_menu', 'Home::adminMenu', ['filter' => 'Admin_Auth']);

$routes->get('/productos', 'Productos::lista', ['filter' => 'Admin_Auth']);

$routes->get('/productos/deshabilitar/(:num)', 'Productos::deshabilitar/$1');

$routes->get('/productos/habilitar/(:num)', 'Productos::habilitar/$1');

$routes->POST('/productos/modificar/(:num)', 'Productos::actualizar/$1');

$routes->get('/catalogo', 'Productos::catalogo_productos');

$routes->get('/usuarios', 'Usuarios_controller::lista', ['filter' => 'Admin_Auth']);

$routes->get('/usuarios/habilitar/(:num)', 'Usuarios_controller::habilitar/$1', ['filter' => 'auth']);

$routes->get('/usuarios/deshabilitar/(:num)', 'Usuarios_controller::deshabilitar/$1', ['filter' => 'auth']);

$routes->get('/usuarios/editar/(:num)', 'Usuarios_controller::editar/$1', ['filter' => 'auth']);

$routes->post('/usuarios/actualizar/(:num)', 'Usuarios_controller::actualizar/$1', ['filter' => 'auth']);

$routes->post('/consultas/guardar', 'Consultas_controller::guardar');

$routes->get('/consultas/cambiar_respondido/(:num)', 'Consultas_controller::cambiar_respondido/$1');

$routes->get('/consulta', 'Consultas_controller::lista', ['filter' => 'Admin_Auth']);

$routes->get('/detalle_producto/(:num)', 'Productos::detalle_producto/$1');

$routes->get('/carrito', 'Carrito_controller::mostrar', ['filter' => 'auth']);

$routes->post('/carrito_eliminar_todo', 'Carrito_controller::eliminar_todo');

$routes->post('/carrito_agregar', 'Carrito_controller::agregar');

$routes->post('/carrito_finalizar', 'Carrito_controller::finalizar_compra');

$routes->post('/carrito_eliminar', 'Carrito_controller::eliminar');

$routes->get('/ventas', 'Ventas_controller::lista', ['filter' => 'Admin_Auth']);

$routes->get('/compras', 'Compras_controller::lista', ['filter' => 'auth']);