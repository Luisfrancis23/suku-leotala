<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/profile', 'Auth::profile', ['filter' => 'login']);
$routes->post('/profile/update', 'Auth::updateProfile', ['filter' => 'login']);

// Dashboard
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'login']);

// Aldeia
$routes->get('/aldeia', 'Aldeia::index', ['filter' => 'login']);
$routes->get('/aldeia/create', 'Aldeia::create', ['filter' => 'login']);
$routes->post('/aldeia/create', 'Aldeia::create', ['filter' => 'login']);
$routes->get('/aldeia/edit/(:num)', 'Aldeia::edit/$1', ['filter' => 'login']);
$routes->post('/aldeia/edit/(:num)', 'Aldeia::edit/$1', ['filter' => 'login']);
$routes->get('/aldeia/delete/(:num)', 'Aldeia::delete/$1', ['filter' => 'login']);

// Populasaun
$routes->get('/populasaun', 'Populasaun::index', ['filter' => 'login']);
$routes->get('/populasaun/create', 'Populasaun::create', ['filter' => 'login']);
$routes->post('/populasaun/create', 'Populasaun::create', ['filter' => 'login']);
$routes->get('/populasaun/edit/(:num)', 'Populasaun::edit/$1', ['filter' => 'login']);
$routes->post('/populasaun/edit/(:num)', 'Populasaun::edit/$1', ['filter' => 'login']);
$routes->get('/populasaun/delete/(:num)', 'Populasaun::delete/$1', ['filter' => 'login']);

// Familia
$routes->get('/familia', 'Familia::index', ['filter' => 'login']);
$routes->get('/familia/create', 'Familia::create', ['filter' => 'login']);
$routes->post('/familia/create', 'Familia::create', ['filter' => 'login']);
$routes->get('/familia/edit/(:num)', 'Familia::edit/$1', ['filter' => 'login']);
$routes->post('/familia/edit/(:num)', 'Familia::edit/$1', ['filter' => 'login']);
$routes->get('/familia/delete/(:num)', 'Familia::delete/$1', ['filter' => 'login']);

// Religiaun
$routes->get('/religiaun', 'Religiaun::index', ['filter' => 'login']);
$routes->get('/religiaun/create', 'Religiaun::create', ['filter' => 'login']);
$routes->post('/religiaun/create', 'Religiaun::create', ['filter' => 'login']);
$routes->get('/religiaun/edit/(:num)', 'Religiaun::edit/$1', ['filter' => 'login']);
$routes->post('/religiaun/edit/(:num)', 'Religiaun::edit/$1', ['filter' => 'login']);
$routes->get('/religiaun/delete/(:num)', 'Religiaun::delete/$1', ['filter' => 'login']);

$routes->get('/', 'Home::index');
