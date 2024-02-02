<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->get('/', 'Home::index');
$routes->post('register', 'Register::index');
$routes->post('login', 'Login::index');

/**
 * API Routes
 */
//login
$routes->post('authAPI', 'API\AuthController::login');
$routes->get('user', 'API\AuthController::user');

$routes->group('api', ['filter' => 'jwtfilter', 'namespace' => 'App\Controllers\API'], function ($routes) {
    //user
    $routes->get('user', 'UserController::index');
    $routes->get('user/(:num)', 'UserController::show/$1');
    $routes->post('user', 'UserController::create');
    $routes->put('user/(:num)', 'UserController::update/$1');
    $routes->delete('user/(:num)', 'UserController::delete/$1');
    
    //ganti password
    $routes->post('gantipassword', 'GantiPasswordController::index');
    
    //pekerjaan
    $routes->get('pekerjaan', 'PekerjaanController::index');
    $routes->get('pekerjaan/(:num)', 'PekerjaanController::show/$1');
    $routes->get('pekerjaanuser/(:num)', 'PekerjaanController::showPekerjaan/$1');

    //task
    $routes->get('task', 'TaskController::index');
    $routes->get('task/(:num)', 'TaskController::show/$1');
    $routes->get('taskbypekerjaan/(:num)', 'TaskController::showTaskByPekerjaan/$1');
    $routes->get('taskbyuser/(:num)', 'TaskController::showTaskByUser/$1');
    $routes->post('task', 'TaskController::create');
    $routes->put('task/(:num)', 'TaskController::update/$1');
    $routes->put('task/submit/(:num)', 'TaskController::submit/$1');
    $routes->delete('task/(:num)', 'TaskController::delete/$1');

    //bobot kategori task
    $routes->get('bobotkategoritask', 'BobotKategoriTaskController::index');
    $routes->get('bobotkategoritask/(:num)', 'BobotKategoriTaskController::show/$1');

    //hari libur
    $routes->get('harilibur', 'HariLiburController::index');
    $routes->get('harilibur/(:num)', 'HariLiburController::show/$1');

    //kategori pekerjaan
    $routes->get('kategoripekerjaan', 'KategoriPekerjaanController::index');
    $routes->get('kategoripekerjaan/(:num)', 'KategoriPekerjaanController::show/$1');

    //kategori task
    $routes->get('kategoritask', 'KategoriTaskController::index');
    $routes->get('kategoritask/(:num)', 'KategoriTaskController::show/$1');

    //kinerja
    $routes->get('kinerja', 'KinerjaController::index');
    $routes->get('kinerja/(:num)', 'KinerjaController::show/$1');

    //notifikasi
    $routes->get('notifikasi', 'NotifikasiController::index');
    $routes->get('notifikasi/(:num)', 'NotifikasiController::show/$1');
    $routes->get('notifikasitouser/(:num)', 'NotifikasiController::showNotifikasiToUser/$1');
    $routes->put('notifikasi/(:num)', 'NotifikasiController::update/$1');

    //personil
    $routes->get('personil', 'PersonilController::index');
    $routes->get('personil/(:num)', 'PersonilController::show/$1');
    $routes->get('personilbyuser/(:num)', 'PersonilController::showPersonilByUser/$1');

    //status pekerjaan
    $routes->get('statuspekerjaan', 'StatusPekerjaanController::index');
    $routes->get('statuspekerjaan/(:num)', 'StatusPekerjaanController::show/$1');

    //status task
    $routes->get('statustask', 'StatusTaskController::index');
    $routes->get('statustask/(:num)', 'StatusTaskController::show/$1');

    //target poin harian
    $routes->get('targetpoinharian', 'TargetPoinHarianController::index');
    $routes->get('targetpoinharian/(:num)', 'TargetPoinHarianController::show/$1');

});