<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/quienes_somos', 'Home::qSomos');

$routes->get('/contact_info', 'Home::contact');

$routes->get('/terminos_y_usos', 'Home::terms');
