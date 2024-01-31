<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

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


//Rotes User
//Untuk menampilkan halaman user
$routes->get('/user/daftar_user', 'User::daftar_user');
