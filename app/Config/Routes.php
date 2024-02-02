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

//Routes autentikasi
//Untuk menampilkan halaman login
$routes->get('/', 'Autentikasi::index');
//Untuk melakukan login ke aplikasi Destask
$routes->post('/login', 'Autentikasi::login');
//Untuk melakukan logout dari aplikasi Destask
$routes->get('/logout', 'Autentikasi::logout');

//Routes dashboard
$routes->get('/dashboard', 'Dashboard::lihat_dashboard');

//Routes Usergroup
//Untuk menampilkan halaman daftar usergroup
$routes->get('/usergroup/daftar_usergroup', 'Usergroup::daftar_usergroup');
//Untuk menambah usergroup
$routes->post('/usergroup/tambah_usergroup', 'Usergroup::tambah_usergroup');
//Untuk mengedit usergroup
$routes->get('/usergroup/edit_usergroup/(:num)', 'Usergroup::edit_usergroup/$1');
$routes->post('/usergroup/update_usergroup', 'Usergroup::update_usergroup');
//Untuk menghapus usergroup
$routes->delete('/usergroup/delete_usergroup/(:num)', 'Usergroup::delete_usergroup/$1');

//Routes Status Pekerjaan
//Untuk menampilkan halaman daftar status pekerjaan
$routes->get('/status_pekerjaan/daftar_status_pekerjaan', 'StatusPekerjaan::daftar_status_pekerjaan');
//Untuk menambah status pekerjaan
$routes->post('/status_pekerjaan/tambah_status_pekerjaan', 'StatusPekerjaan::tambah_status_pekerjaan');
//Untuk mengedit status pekerjaan
$routes->get('/status_pekerjaan/edit_status_pekerjaan/(:num)', 'StatusPekerjaan::edit_status_pekerjaan/$1');
$routes->post('/status_pekerjaan/update_status_pekerjaan', 'StatusPekerjaan::update_status_pekerjaan');
//Untuk menghapus status pekerjaan
$routes->delete('/status_pekerjaan/delete_status_pekerjaan/(:num)', 'StatusPekerjaan::delete_status_pekerjaan/$1');

//Routes Status Task
//Untuk menampilkan halaman daftar status task
$routes->get('/status_task/daftar_status_task', 'StatusTask::daftar_status_task');
//Untuk menambah status task
$routes->post('/status_task/tambah_status_task', 'StatusTask::tambah_status_task');


//Rotes User
//Untuk menampilkan halaman user
$routes->get('/user/daftar_user', 'User::daftar_user');
