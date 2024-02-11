<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//                                       //
// ROUTING APLIKASI BERBASIS WEB DESTASK //
//                                       //

//Routes autentikasi
//Untuk menampilkan halaman login
$routes->get('/', 'Autentikasi::index');
//Untuk melakukan login ke aplikasi Destask
$routes->post('/login', 'Autentikasi::login');
//Untuk melakukan logout dari aplikasi Destask
$routes->get('/logout', 'Autentikasi::logout');

//Routes dashboard
$routes->get('/dashboard', 'Dashboard::lihat_dashboard');

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

//Routes Kategori Pekerjaan
//Untuk menampilkan halaman daftar kategori pekerjaan
$routes->get('/kategori_pekerjaan/daftar_kategori_pekerjaan', 'KategoriPekerjaan::daftar_kategori_pekerjaan');
//Untuk menambah kategori pekerjaan
$routes->post('/kategori_pekerjaan/tambah_kategori_pekerjaan', 'KategoriPekerjaan::tambah_kategori_pekerjaan');
//Untuk mengedit kategori pekerjaan
$routes->get('/kategori_pekerjaan/edit_kategori_pekerjaan/(:num)', 'KategoriPekerjaan::edit_kategori_pekerjaan/$1');
$routes->post('/kategori_pekerjaan/update_kategori_pekerjaan', 'KategoriPekerjaan::update_kategori_pekerjaan');
//Untuk menghapus kategori pekerjaan
$routes->delete('/kategori_pekerjaan/delete_kategori_pekerjaan/(:num)', 'KategoriPekerjaan::delete_kategori_pekerjaan/$1');

//Routes Status Task
//Untuk menampilkan halaman daftar status task
$routes->get('/status_task/daftar_status_task', 'StatusTask::daftar_status_task');
//Untuk menambah status task
$routes->post('/status_task/tambah_status_task', 'StatusTask::tambah_status_task');
//Untuk mengedit status task
$routes->get('/status_task/edit_status_task/(:num)', 'StatusTask::edit_status_task/$1');
$routes->post('/status_task/update_status_task', 'StatusTask::update_status_task');
//Untuk menghapus status task
$routes->delete('/status_task/delete_status_task/(:num)', 'StatusTask::delete_status_task/$1');

//Routes Kategori Task
//Untuk menampilkan halaman daftar kategori task
$routes->get('/kategori_task/daftar_kategori_task', 'KategoriTask::daftar_kategori_task');
//Untuk menambah kategori task
$routes->post('/kategori_task/tambah_kategori_task', 'KategoriTask::tambah_kategori_task');
//Untuk mengedit kategori task
$routes->get('/kategori_task/edit_kategori_task/(:num)', 'KategoriTask::edit_kategori_task/$1');
$routes->post('/kategori_task/update_kategori_task', 'KategoriTask::update_kategori_task');
//Untuk menghapus kategori task
$routes->delete('/kategori_task/delete_kategori_task/(:num)', 'KategoriTask::delete_kategori_task/$1');

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
//Untuk melihat detail usergroup
$routes->get('/usergroup/detail_usergroup/(:num)', 'Usergroup::detail_usergroup/$1');

//Rotes User
//Untuk menampilkan halaman user
$routes->get('/user/daftar_user', 'User::daftar_user');
//Untuk menambah user
$routes->post('/user/tambah_user', 'User::tambah_user');
//Untuk mengedit user
$routes->get('/user/edit_user/(:num)', 'User::edit_user/$1');
$routes->post('/user/update_user', 'User::update_user');
//Untuk menghapus user
$routes->delete('/user/delete_user/(:num)', 'User::delete_user/$1');

//Routes Profile
//Untuk menampilkan halaman profile
$routes->get('/profile/lihat_profil', 'Profile::lihat_profile');
//Untuk mengupdate password
$routes->post('/profile/update_password', 'Profile::update_password');





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
