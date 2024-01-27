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
//Untuk menampilkan halaman usergroup
$routes->get('/usergroup/daftar_usergroup', 'Usergroup::daftar_usergroup');
