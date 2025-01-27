<?php

use CodeIgniter\Router\RouteCollection;

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// Auth Routes
$routes->get('/', 'Auth::login');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::register');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// Dashboard Route (protected)
$routes->get('dashboard', 'Dashboard::index');

// Dashboard & Protected Routes
$routes->group('', ['filter' => 'auth'], function ($routes) {
    // Dokter Routes
    $routes->group('dokter', function ($routes) {
        $routes->get('', 'Dokter::index');
        $routes->get('create', 'Dokter::create');
        $routes->post('store', 'Dokter::store');
        $routes->get('edit/(:num)', 'Dokter::edit/$1');
        $routes->post('update/(:num)', 'Dokter::update/$1');
        $routes->get('delete/(:num)', 'Dokter::delete/$1');
    });

    // Pasien Routes
    $routes->group('pasien', function ($routes) {
        $routes->get('', 'Pasien::index');
        $routes->get('create', 'Pasien::create');
        $routes->post('store', 'Pasien::store');
        $routes->get('edit/(:num)', 'Pasien::edit/$1');
        $routes->post('update/(:num)', 'Pasien::update/$1');
        $routes->get('delete/(:num)', 'Pasien::delete/$1');
    });

    // Rekam Medis Routes
    $routes->group('rekam-medis', function ($routes) {
        $routes->get('', 'RekamMedis::index');
        $routes->get('create', 'RekamMedis::create');
        $routes->post('store', 'RekamMedis::store');
        $routes->get('edit/(:num)', 'RekamMedis::edit/$1');
        $routes->post('update/(:num)', 'RekamMedis::update/$1');
        $routes->get('delete/(:num)', 'RekamMedis::delete/$1');
    });
});

// Disable auto routing
$routes->setAutoRoute(false);
