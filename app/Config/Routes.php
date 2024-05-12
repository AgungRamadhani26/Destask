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
//Untuk menampilkan halaman lupa password
$routes->get('/lupa_password', 'Profile::lupa_password');
//Untuk melakukan cek email
$routes->post('/lupa_password/cek_email', 'Profile::cek_email');
//Untuk menampilkan halaman reset password
$routes->get('/lupa_password/reset_password/(:any)', 'Profile::reset_password/$1');
//Untuk melakukan reset password
$routes->post('/lupa_password/save_reset_password/(:num)', 'Profile::save_reset_password/$1');
//Untuk menampilkan hasil reset password berhasil atau tidak
$routes->get('/lupa_password/result_reset_password', 'Profile::result_reset_password');

//Routes pekerjaan
//Untuk menampilkan halaman daftar pekerjaan
$routes->get('/pekerjaan/daftar_pekerjaan', 'Pekerjaan::daftar_pekerjaan');
//Untuk menampilkan form tambah pekerjaan
$routes->get('/pekerjaan/add_pekerjaan', 'Pekerjaan::add_pekerjaan');
//Untuk menambah pekerjaan
$routes->post('/pekerjaan/tambah_pekerjaan', 'Pekerjaan::tambah_pekerjaan');
//Untuk melihat detail pekerjaan
$routes->get('/pekerjaan/detail_pekerjaan/(:num)', 'Pekerjaan::detail_pekerjaan/$1');
//Untuk menampilkan form edit pekerjaan
$routes->get('/pekerjaan/edit_pekerjaan/(:num)', 'Pekerjaan::edit_pekerjaan/$1');
$routes->post('/pekerjaan/update_pekerjaan', 'Pekerjaan::update_pekerjaaan');
$routes->get('/pekerjaan/edit_personil_pekerjaan/(:num)', 'Personil::edit_personil_pekerjaan/$1');
//Untuk memfilter data yang ditampilkan
$routes->get('/pekerjaan/filter_pekerjaan', 'Pekerjaan::filter_pekerjaan');
//Untuk mengedit status pekerjaan dari sebuah pekerjaan
$routes->get('/pekerjaan/editpekerjaan_status_pekerjaan/(:num)', 'Pekerjaan::editpekerjaan_status_pekerjaan/$1');
$routes->post('/pekerjaan/updatepekerjaan_status_pekerjaan', 'Pekerjaan::updatepekerjaan_status_pekerjaan');
//Untuk menghapus pekerjaan
$routes->delete('/pekerjaan/delete_pekerjaan/(:num)', 'Pekerjaan::delete_pekerjaan/$1');

//Rotes Task
//Untuk menampilkan halaman daftar task
$routes->get('/task/daftar_task/(:num)', 'Task::daftar_task/$1');
//Untuk menampilkan form tambah task
$routes->get('/task/add_task/(:num)', 'Task::add_task/$1');
//Untuk menambah task
$routes->post('/task/tambah_task', 'Task::tambah_task');
//Untuk menampilkan form edit task
$routes->get('/task/edit_task/(:num)', 'Task::edit_task/$1');
$routes->post('/task/update_task', 'Task::update_task');
//Untuk menghapus task
$routes->delete('/task/delete_task/(:num)', 'Task::delete_task/$1');
//Untuk menampilkan form submit task
$routes->get('/task/submit_task/(:num)', 'Task::submit_task/$1');
//Untuk submit task
$routes->post('/task/save_submit_task', 'Task::save_submit_task');
//Untuk melihat detail task
$routes->get('/task/detail_task/(:num)', 'Task::detail_task/$1');
//Untuk memfilter data yang ditampilkan
$routes->get('/task/filter_task/(:num)', 'Task::filter_task/$1');

//Routes Personil
//Untuk edit personil pm
$routes->get('/personil/edit_personil/(:num)', 'Personil::edit_personil/$1');
$routes->post('/personil/update_personil', 'Personil::update_personil');
//Untuk tambah personil desainer
$routes->post('/personil/tambah_personil_desainer', 'Personil::tambah_personil_desainer');
//Untuk tambah personil be web
$routes->post('/personil/tambah_personil_be_web', 'Personil::tambah_personil_be_web');
//Untuk tambah personil fe web
$routes->post('/personil/tambah_personil_fe_web', 'Personil::tambah_personil_fe_web');
//Untuk tambah personil be mobile
$routes->post('/personil/tambah_personil_be_mobile', 'Personil::tambah_personil_be_mobile');
//Untuk tambah personil fe mobile
$routes->post('/personil/tambah_personil_fe_mobile', 'Personil::tambah_personil_fe_mobile');
//Untuk tambah personil tester
$routes->post('/personil/tambah_personil_tester', 'Personil::tambah_personil_tester');
//Untuk tambah personil admin
$routes->post('/personil/tambah_personil_admin', 'Personil::tambah_personil_admin');
//Untuk tambah personil helpdesk
$routes->post('/personil/tambah_personil_helpdesk', 'Personil::tambah_personil_helpdesk');
//Untuk menghapus personil
$routes->delete('/personil/delete_personil/(:num)/(:num)', 'Personil::delete_personil/$1/$2');

//Routes Status Pekerjaan
//Untuk menampilkan halaman daftar status pekerjaan
$routes->get('/status_pekerjaan/daftar_status_pekerjaan', 'StatusPekerjaan::daftar_status_pekerjaan');
//Untuk menambah status pekerjaan
// $routes->post('/status_pekerjaan/tambah_status_pekerjaan', 'StatusPekerjaan::tambah_status_pekerjaan');
//Untuk mengedit status pekerjaan
$routes->get('/status_pekerjaan/edit_status_pekerjaan/(:num)', 'StatusPekerjaan::edit_status_pekerjaan/$1');
$routes->post('/status_pekerjaan/update_status_pekerjaan', 'StatusPekerjaan::update_status_pekerjaan');
//Untuk menghapus status pekerjaan
// $routes->delete('/status_pekerjaan/delete_status_pekerjaan/(:num)', 'StatusPekerjaan::delete_status_pekerjaan/$1');

//Routes Kategori Pekerjaan
//Untuk menampilkan halaman daftar kategori pekerjaan
$routes->get('/kategori_pekerjaan/daftar_kategori_pekerjaan', 'KategoriPekerjaan::daftar_kategori_pekerjaan');
//Untuk menambah kategori pekerjaan
// $routes->post('/kategori_pekerjaan/tambah_kategori_pekerjaan', 'KategoriPekerjaan::tambah_kategori_pekerjaan');
//Untuk mengedit kategori pekerjaan
$routes->get('/kategori_pekerjaan/edit_kategori_pekerjaan/(:num)', 'KategoriPekerjaan::edit_kategori_pekerjaan/$1');
$routes->post('/kategori_pekerjaan/update_kategori_pekerjaan', 'KategoriPekerjaan::update_kategori_pekerjaan');
//Untuk menghapus kategori pekerjaan
// $routes->delete('/kategori_pekerjaan/delete_kategori_pekerjaan/(:num)', 'KategoriPekerjaan::delete_kategori_pekerjaan/$1');

//Routes Status Task
//Untuk menampilkan halaman daftar status task
$routes->get('/status_task/daftar_status_task', 'StatusTask::daftar_status_task');
//Untuk menambah status task
// $routes->post('/status_task/tambah_status_task', 'StatusTask::tambah_status_task');
//Untuk mengedit status task
$routes->get('/status_task/edit_status_task/(:num)', 'StatusTask::edit_status_task/$1');
$routes->post('/status_task/update_status_task', 'StatusTask::update_status_task');
//Untuk menghapus status task
// $routes->delete('/status_task/delete_status_task/(:num)', 'StatusTask::delete_status_task/$1');

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

//Routes Hari Libur
//Untuk menampilkan halaman daftar hari libur
$routes->get('/hari_libur/daftar_hari_libur', 'HariLibur::daftar_hari_libur');
//Untuk menambah hari libur
$routes->post('/hari_libur/tambah_hari_libur', 'HariLibur::tambah_hari_libur/$1');
//Untuk mengedit hari libur
$routes->get('/hari_libur/edit_hari_libur/(:num)', 'HariLibur::edit_hari_libur/$1');
$routes->post('/hari_libur/update_hari_libur', 'HariLibur::update_hari_libur');
//Untuk menghapus hari libur
$routes->delete('/hari_libur/delete_hari_libur/(:num)', 'HariLibur::delete_hari_libur/$1');

//Routes Usergroup
//Untuk menampilkan halaman daftar usergroup
$routes->get('/usergroup/daftar_usergroup', 'Usergroup::daftar_usergroup');
//Untuk menambah usergroup
// $routes->post('/usergroup/tambah_usergroup', 'Usergroup::tambah_usergroup');
//Untuk mengedit usergroup
$routes->get('/usergroup/edit_usergroup/(:num)', 'Usergroup::edit_usergroup/$1');
$routes->post('/usergroup/update_usergroup', 'Usergroup::update_usergroup');
//Untuk menghapus usergroup
// $routes->delete('/usergroup/delete_usergroup/(:num)', 'Usergroup::delete_usergroup/$1');
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

//Routes target poin harian
//Untuk menampilkan halaman target poin harian
$routes->get('/target_poin_harian/daftar_target_poin_harian', 'TargetPoinHarian::daftar_target_poin_harian');
//Untuk menambah target poin harian
$routes->post('/target_poin_harian/tambah_target_poin_harian', 'TargetPoinHarian::tambah_target_poin_harian');
//Untuk mengedit target poin harian
$routes->get('/target_poin_harian/edit_target_poin_harian/(:num)', 'TargetPoinHarian::edit_target_poin_harian/$1');
$routes->post('/target_poin_harian/update_target_poin_harian', 'TargetPoinHarian::update_target_poin_harian');
//Untuk menghapus target poin harian
$routes->delete('/target_poin_harian/delete_target_poin_harian/(:num)', 'TargetPoinHarian::delete_target_poin_harian/$1');
//Untuk memfilter data yang ditampilkan
$routes->get('/target_poin_harian/filter_target_poin_harian', 'TargetPoinHarian::filter_target_poin_harian');

//Routes bobot kategori task
//Untuk menampilkan halaman bobot kategori task
$routes->get('/bobot_kategori_task/daftar_bobot_kategori_task', 'BobotKategoriTask::daftar_bobot_kategori_task');
//Untuk menambah bobot kategori task
$routes->post('/bobot_kategori_task/tambah_bobot_kategori_task', 'BobotKategoriTask::tambah_bobot_kategori_task');
//Untuk mengedit bobot kategori task
$routes->get('/bobot_kategori_task/edit_bobot_kategori_task/(:num)/(:num)', 'BobotKategoriTask::edit_bobot_kategori_task/$1/$2');
$routes->post('/bobot_kategori_task/update_bobot_kategori_task', 'BobotKategoriTask::update_bobot_kategori_task');
//Untuk menghapus bobot kategori task
$routes->delete('/bobot_kategori_task/delete_bobot_kategori_task/(:num)/(:num)', 'BobotKategoriTask::delete_bobot_kategori_task/$1/$2');
//Untuk memfilter data yang ditampilkan
$routes->get('/bobot_kategori_task/filter_bobot_kategori_task', 'BobotKategoriTask::filter_bobot_kategori_task');
//Untuk melihat detail bobot kategori task
$routes->get('/bobot_kategori_task/detail_bobot_kategori_task/(:num)/(:num)', 'BobotKategoriTask::detail_bobot_kategori_task/$1/$2');


//Routes Profile
//Untuk menampilkan halaman profile
$routes->get('/profile/lihat_profil', 'Profile::lihat_profile');
//Untuk mengupdate password
$routes->post('/profile/update_password', 'Profile::update_password');
//Untuk mengupdate profile
$routes->post('/profile/update_profile', 'Profile::update_profile');





/**
 * API Routes
 */
//login
$routes->post('authlogin', 'API\AuthController::login');
$routes->post('authcekuser', 'API\AuthController::cekuser');

//lupapassword
$routes->post('lupapassword', 'API\LupaPasswordController::lupaPassword');
$routes->post('lupapassword/verifikasitoken', 'API\LupaPasswordController::verifikasiToken');
$routes->post('lupapassword/resetpassword', 'API\LupaPasswordController::resetPassword');

$routes->group('api', ['filter' => 'jwtfilter', 'namespace' => 'App\Controllers\API'], function ($routes) {
   //user
   $routes->get('user', 'UserController::index');
   $routes->get('user/(:num)', 'UserController::show/$1');
   $routes->post('user', 'UserController::create');
   $routes->put('user/(:num)', 'UserController::update/$1');
   $routes->delete('user/(:num)', 'UserController::delete/$1');
   $routes->post('user/fotoprofil', 'FotoProfilController::upload');

   //ganti password
   $routes->put('gantipassword', 'GantiPasswordController::index');



   //pekerjaan
   $routes->get('pekerjaan', 'PekerjaanController::index');
   $routes->get('pekerjaan/(:num)', 'PekerjaanController::show/$1');
   $routes->get('pekerjaanbyuser/(:num)', 'PekerjaanController::showPekerjaan/$1');
   $routes->put('pekerjaan/(:num)', 'PekerjaanController::update/$1'); //edit pekerjaan

   //task
   $routes->get('task', 'TaskController::index');
   $routes->get('task/(:num)', 'TaskController::show/$1');
   $routes->get('taskbypekerjaan/(:num)', 'TaskController::showTaskByPekerjaan/$1'); //data task berdasarkan pekerjaan
   $routes->get('taskbyuser/(:num)', 'TaskController::showTaskByUser/$1'); //data task berdasarkan user
   $routes->get('task/verifikasi/(:num)', 'TaskController::showTaskVerifikasi/$1'); //data task yang perlu diverifikasi
   $routes->put('task/verifikasi/(:num)', 'TaskController::updateverifikasi/$1'); //data task yang perlu diverifikasi
   $routes->post('task', 'TaskController::create');
   $routes->put('task/(:num)', 'TaskController::update/$1'); //edit task
   $routes->post('task/submit', 'TaskController::submit'); //submit bukti selesai task
   $routes->delete('task/(:num)', 'TaskController::delete/$1');

   //bobot kategori task
   $routes->get('bobotkategoritask', 'BobotKategoriTaskController::index');
   $routes->get('bobotkategoritask/(:num)', 'BobotKategoriTaskController::show/$1');
   $routes->get('cekbobotkategoritask', 'BobotKategoriTaskController::cekbobot');

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
   $routes->get('notifikasi/user/(:num)', 'NotifikasiController::showNotifikasiToUser/$1');
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
   $routes->get('targetpoinharianbyuser/(:num)', 'TargetPoinHarianController::targetpoinharianbyuser/$1');
   $routes->get('cektargetpoinharian', 'TargetPoinHarianController::cektargetpoinharian');

   //rekap point
   $routes->get('rekappoint/(:num)', 'RekapPointController::rekappoint/$1');
});
