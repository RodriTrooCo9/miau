<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Mascota CRUD Routes
$routes->get('mascotas', 'Mascota::index');
$routes->get('mascotas/create', 'Mascota::create');
$routes->post('mascotas/store', 'Mascota::store');
$routes->get('mascotas/edit/(:num)', 'Mascota::edit/$1');
$routes->post('mascotas/update/(:num)', 'Mascota::update/$1');
$routes->get('mascotas/delete/(:num)', 'Mascota::delete/$1');
