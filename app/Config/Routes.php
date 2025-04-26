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
