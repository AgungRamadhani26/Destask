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
$routes->get('/', 'Autentikasi::index', ['filter' => 'khususPengguna']); //Akses beres udah dibikin filter/middleware khususPengguna
//Untuk melakukan login ke aplikasi Destask
$routes->post('/login', 'Autentikasi::login'); //Akses beres udah dibikin filter/middleware PendukungAutentikasi
//Untuk melakukan logout dari aplikasi Destask
$routes->get('/logout', 'Autentikasi::logout'); //Akses beres tidak perlu diberi filter/middleware, session dihapus

//Routes dashboard
$routes->get('/dashboard', 'Dashboard::lihat_dashboard'); //Akses beres tidak perlu diberi filter/middleware, hal ini karena semua orang bisa lihat dashboard tergantung session yang login
//Untuk menampilkan halaman lupa password
$routes->get('/lupa_password', 'Profile::lupa_password'); //Akses beres udah dibikin filter/middleware PendukungAutentikasi
//Untuk melakukan cek email
$routes->post('/lupa_password/cek_email', 'Profile::cek_email'); //Akses beres udah dibikin filter/middleware PendukungAutentikasi
//Untuk menampilkan halaman reset password
$routes->get('/lupa_password/reset_password/(:any)', 'Profile::reset_password/$1'); //Akses beres udah dibikin filter/middleware PendukungAutentikasi
//Untuk melakukan reset password
$routes->post('/lupa_password/save_reset_password/(:num)', 'Profile::save_reset_password/$1'); //Akses beres udah dibikin filter/middleware PendukungAutentikasi
//Untuk menampilkan hasil reset password berhasil atau tidak
$routes->get('/lupa_password/result_reset_password', 'Profile::result_reset_password'); //Akses beres udah dibikin filter/middleware PendukungAutentikasi

//Routes pekerjaan
//Untuk menampilkan halaman daftar pekerjaan
$routes->get('/pekerjaan/daftar_pekerjaan', 'Pekerjaan::daftar_pekerjaan'); //Akses beres tidak perlu diberi filter/middleware, hal ini karena semua orang bisa lihat daftar pekerjaan tergantung session yang login
//Untuk menampilkan form tambah pekerjaan
$routes->get('/pekerjaan/add_pekerjaan', 'Pekerjaan::add_pekerjaan'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk menambah pekerjaan
$routes->post('/pekerjaan/tambah_pekerjaan', 'Pekerjaan::tambah_pekerjaan'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk melihat detail pekerjaan
$routes->get('/pekerjaan/detail_pekerjaan/(:num)', 'Pekerjaan::detail_pekerjaan/$1'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk menampilkan form edit pekerjaan
$routes->get('/pekerjaan/edit_pekerjaan/(:num)', 'Pekerjaan::edit_pekerjaan/$1'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
$routes->post('/pekerjaan/update_pekerjaan', 'Pekerjaan::update_pekerjaaan'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
$routes->get('/pekerjaan/edit_personil_pekerjaan/(:num)', 'Personil::edit_personil_pekerjaan/$1'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk memfilter data yang ditampilkan
$routes->get('/pekerjaan/filter_pekerjaan', 'Pekerjaan::filter_pekerjaan'); //Akses beres tidak perlu diberi filter/middleware, hal ini karena semua orang bisa memfilter daftar pekerjaan tergantung session yang login
//Untuk mengedit status pekerjaan dari sebuah pekerjaan
$routes->get('/pekerjaan/editpekerjaan_status_pekerjaan/(:num)', 'Pekerjaan::editpekerjaan_status_pekerjaan/$1'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
$routes->post('/pekerjaan/updatepekerjaan_status_pekerjaan', 'Pekerjaan::updatepekerjaan_status_pekerjaan'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk menghapus pekerjaan
$routes->delete('/pekerjaan/delete_pekerjaan/(:num)', 'Pekerjaan::delete_pekerjaan/$1'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin

//Untuk download pekerjaan
//Untuk menampilkan halaman download pekerjaan
$routes->get('/pekerjaan/download_pekerjaan', 'Pekerjaan::download_pekerjaan'); //Akses beres tidak perlu diberi filter/middleware, hal ini karena semua orang bisa download pekerjaan tergantung session yang login
//Untuk mendownload pekerjaan presales file excel dan pdf
$routes->get('/pekerjaan/download_pekerjaan_presales_excel', 'Pekerjaan::download_pekerjaan_presales_excel'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_presales_excel/(:num)', 'Pekerjaan::download_pekerjaan_presales_excel_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_presales_pdf', 'Pekerjaan::download_pekerjaan_presales_pdf'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_presales_pdf/(:num)', 'Pekerjaan::download_pekerjaan_presales_pdf_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi
//Untuk mendownload pekerjaan on progress file excel dan pdf
$routes->get('/pekerjaan/download_pekerjaan_onprogress_excel', 'Pekerjaan::download_pekerjaan_onprogress_excel'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_onprogress_excel/(:num)', 'Pekerjaan::download_pekerjaan_onprogress_excel_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_onprogress_pdf', 'Pekerjaan::download_pekerjaan_onprogress_pdf'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_onprogress_pdf/(:num)', 'Pekerjaan::download_pekerjaan_onprogress_pdf_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi
//Untuk mendownload pekerjaan bast file excel dan pdf
$routes->get('/pekerjaan/download_pekerjaan_bast_excel', 'Pekerjaan::download_pekerjaan_bast_excel'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_bast_excel/(:num)', 'Pekerjaan::download_pekerjaan_bast_excel_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_bast_pdf', 'Pekerjaan::download_pekerjaan_bast_pdf'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_bast_pdf/(:num)', 'Pekerjaan::download_pekerjaan_bast_pdf_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi
//Untuk mendownload pekerjaan support file excel dan pdf
$routes->get('/pekerjaan/download_pekerjaan_support_excel', 'Pekerjaan::download_pekerjaan_support_excel'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_support_excel/(:num)', 'Pekerjaan::download_pekerjaan_support_excel_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_support_pdf', 'Pekerjaan::download_pekerjaan_support_pdf'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_support_pdf/(:num)', 'Pekerjaan::download_pekerjaan_support_pdf_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi
//Untuk mendownload pekerjaaan cancel file excel dan pdf
$routes->get('/pekerjaan/download_pekerjaan_cancel_excel', 'Pekerjaan::download_pekerjaan_cancel_excel'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_cancel_excel/(:num)', 'Pekerjaan::download_pekerjaan_cancel_excel_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_cancel_pdf', 'Pekerjaan::download_pekerjaan_cancel_pdf'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_cancel_pdf/(:num)', 'Pekerjaan::download_pekerjaan_cancel_pdf_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi
//Untuk mendownload pekerjaan semua pekerjaan file excel dan pdf
$routes->get('/pekerjaan/download_pekerjaan_semua_pekerjaan_excel', 'Pekerjaan::download_pekerjaan_semua_pekerjaan_excel'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_semua_pekerjaan_excel/(:num)', 'Pekerjaan::download_pekerjaan_semua_pekerjaan_excel_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_semua_pekerjaan_pdf', 'Pekerjaan::download_pekerjaan_semua_pekerjaan_pdf'); //Akses beres middleware hanya pendukung autentikasi
$routes->get('/pekerjaan/download_pekerjaan_semua_pekerjaan_pdf/(:num)', 'Pekerjaan::download_pekerjaan_semua_pekerjaan_pdf_by_year/$1'); //Akses beres middleware hanya pendukung autentikasi

//Rotes Task
//Untuk menampilkan halaman daftar task
$routes->get('/task/daftar_task/(:num)', 'Task::daftar_task/$1'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk menampilkan form tambah task
$routes->get('/task/add_task/(:num)', 'Task::add_task/$1'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk menambah task
$routes->post('/task/tambah_task', 'Task::tambah_task'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk menampilkan form edit task
$routes->get('/task/edit_task/(:num)', 'Task::edit_task/$1'); //Sudah beres masalah akses karena semua udah diatur di controller
$routes->post('/task/update_task', 'Task::update_task'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk menghapus task
$routes->delete('/task/delete_task/(:num)', 'Task::delete_task/$1'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk menampilkan form submit task
$routes->get('/task/submit_task/(:num)', 'Task::submit_task/$1'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk submit task
$routes->post('/task/save_submit_task', 'Task::save_submit_task'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk melihat detail task
$routes->get('/task/detail_task/(:num)', 'Task::detail_task/$1'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk memfilter data yang ditampilkan
$routes->get('/task/filter_task/(:num)', 'Task::filter_task/$1'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk menampilkan halaman daftar task yang harus diverivikasi
$routes->get('/task/daftar_verifikasi_task', 'Task::daftar_verifikasi_task');
//Untuk menampilkan verifikasi task
$routes->get('/task/verifikasi_task/(:num)', 'Task::verifikasi_task/$1'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk melihat alasan verifikasi task
$routes->get('/task/alasan_verifikasi_task/(:num)', 'Task::alasan_verifikasi_task/$1'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk menerima verifikasi task
$routes->post('/task/terima_verifikasi_task', 'Task::terima_verifikasi_task'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk menolak verifikasi task
$routes->post('/task/tolak_verifikasi_task', 'Task::tolak_verifikasi_task'); //Sudah beres masalah akses karena semua udah diatur di controller

//Routes Kinerja
//Untuk menampilkan halaman daftar kinerja karyawan
$routes->get('/kinerja/daftar_kinerja_karyawan', 'Kinerja::daftar_kinerja_karyawan'); //Akses beres udah dibikin filter/middleware ExceptAdmin
//Untuk memfilter halaman daftar kinerja karyawan
$routes->get('/kinerja/filter_kinerja_karyawan', 'Kinerja::filter_kinerja_karyawan'); //Akses beres udah dibikin filter/middleware ExceptAdmin
//Untuk melihat halaman daftar kinerja perkaryawan
$routes->get('/kinerja/daftar_kinerja_karyawan/(:num)', 'Kinerja::daftar_kinerja_perkaryawan/$1'); //Akses beres udah dibikin filter/middleware ExceptAdmin
//Untuk memfilter kinerja perkaryawan
$routes->get('/kinerja/filter_kinerja_karyawan/(:num)', 'Kinerja::filter_kinerja_perkaryawan/$1'); //Akses beres udah dibikin filter/middleware ExceptAdmin
//Untuk menampilkan form periode kinerja karyawan
$routes->get('/kinerja/cek_periode_kinerja_karyawan/(:num)', 'Kinerja::cek_periode_kinerja_karyawan/$1'); //Akses beres udah dibikin filter/middleware KhususHOD
$routes->post('/kinerja/pengecekan_periode_kinerja_karyawan', 'Kinerja::pengecekan_periode_kinerja_karyawan'); //Akses beres udah dibikin filter/middleware KhususHOD
//Untuk menampilkan form tambah kinerja
$routes->get('/kinerja/add_kinerja_karyawan/(:num)/(:num)/(:num)', 'Kinerja::add_kinerja_karyawan/$1/$2/$3'); //Akses beres udah dibikin filter/middleware KhususHOD
//Untuk menambah kinerja karyawan
$routes->post('/kinerja/tambah_kinerja_karyawan', 'Kinerja::tambah_kinerja_karyawan'); //Akses beres udah dibikin filter/middleware KhususHOD
//Untuk mengedit kinerja karyawan
$routes->get('/kinerja/edit_kinerja_karyawan/(:num)', 'Kinerja::edit_kinerja_karyawan/$1'); //Akses beres udah dibikin filter/middleware KhususHOD
$routes->post('/kinerja/update_kinerja_karyawan', 'Kinerja::update_kinerja_karyawan'); //Akses beres udah dibikin filter/middleware KhususHOD
//Untuk melihat detai kinerja
$routes->get('/kinerja/detail_kinerja_karyawan/(:num)', 'Kinerja::detail_kinerja_karyawan/$1'); //Sudah beres masalah akses karena semua udah diatur di controller
//Untuk menghapus kinerja karyawan
$routes->delete('/kinerja/delete_kinerja_karyawan/(:num)/(:num)', 'Kinerja::delete_kinerja_karyawan/$1/$2'); //Akses beres udah dibikin filter/middleware KhususHOD

//Routes Realisasi VS Target
//Untuk menampilkan halaman realisasi vs target
$routes->get('/realisasi_vs_target/daftar_realisasi_vs_target', 'RealisasiVsTarget::daftar_realisasi_vs_target'); //Akses sudah beres udah dibikin filter/middleware ExceptAdminandStaff
//Untuk memfilter data yang ditampilkan
$routes->get('/realisasi_vs_target/filter_realisasi_vs_target', 'RealisasiVsTarget::filter_realisasi_vs_target'); //Akses sudah beres udah dibikin filter/middleware ExceptAdminandStaff

//Routes Personil
//Untuk edit personil pm
$routes->get('/personil/edit_personil/(:num)', 'Personil::edit_personil/$1'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
$routes->post('/personil/update_personil', 'Personil::update_personil'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk tambah personil desainer
$routes->post('/personil/tambah_personil_desainer', 'Personil::tambah_personil_desainer'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk tambah personil be web
$routes->post('/personil/tambah_personil_be_web', 'Personil::tambah_personil_be_web'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk tambah personil fe web
$routes->post('/personil/tambah_personil_fe_web', 'Personil::tambah_personil_fe_web'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk tambah personil be mobile
$routes->post('/personil/tambah_personil_be_mobile', 'Personil::tambah_personil_be_mobile'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk tambah personil fe mobile
$routes->post('/personil/tambah_personil_fe_mobile', 'Personil::tambah_personil_fe_mobile'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk tambah personil tester
$routes->post('/personil/tambah_personil_tester', 'Personil::tambah_personil_tester'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk tambah personil admin
$routes->post('/personil/tambah_personil_admin', 'Personil::tambah_personil_admin'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk tambah personil helpdesk
$routes->post('/personil/tambah_personil_helpdesk', 'Personil::tambah_personil_helpdesk'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin
//Untuk menghapus personil
$routes->delete('/personil/delete_personil/(:num)/(:num)', 'Personil::delete_personil/$1/$2'); //Akses beres udah dibikin filter/middleware KhususHODandAdmin

//Routes Status Pekerjaan
//Untuk menampilkan halaman daftar status pekerjaan
$routes->get('/status_pekerjaan/daftar_status_pekerjaan', 'StatusPekerjaan::daftar_status_pekerjaan'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menambah status pekerjaan
// $routes->post('/status_pekerjaan/tambah_status_pekerjaan', 'StatusPekerjaan::tambah_status_pekerjaan');
//Untuk mengedit status pekerjaan
$routes->get('/status_pekerjaan/edit_status_pekerjaan/(:num)', 'StatusPekerjaan::edit_status_pekerjaan/$1'); //Akses beres udah dibikin filter/middleware khususAdmin
$routes->post('/status_pekerjaan/update_status_pekerjaan', 'StatusPekerjaan::update_status_pekerjaan'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menghapus status pekerjaan
// $routes->delete('/status_pekerjaan/delete_status_pekerjaan/(:num)', 'StatusPekerjaan::delete_status_pekerjaan/$1');

//Routes Kategori Pekerjaan
//Untuk menampilkan halaman daftar kategori pekerjaan
$routes->get('/kategori_pekerjaan/daftar_kategori_pekerjaan', 'KategoriPekerjaan::daftar_kategori_pekerjaan'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menambah kategori pekerjaan
// $routes->post('/kategori_pekerjaan/tambah_kategori_pekerjaan', 'KategoriPekerjaan::tambah_kategori_pekerjaan');
//Untuk mengedit kategori pekerjaan
$routes->get('/kategori_pekerjaan/edit_kategori_pekerjaan/(:num)', 'KategoriPekerjaan::edit_kategori_pekerjaan/$1'); //Akses beres udah dibikin filter/middleware khususAdmin
$routes->post('/kategori_pekerjaan/update_kategori_pekerjaan', 'KategoriPekerjaan::update_kategori_pekerjaan'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menghapus kategori pekerjaan
// $routes->delete('/kategori_pekerjaan/delete_kategori_pekerjaan/(:num)', 'KategoriPekerjaan::delete_kategori_pekerjaan/$1');

//Routes Status Task
//Untuk menampilkan halaman daftar status task
$routes->get('/status_task/daftar_status_task', 'StatusTask::daftar_status_task'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menambah status task
// $routes->post('/status_task/tambah_status_task', 'StatusTask::tambah_status_task');
//Untuk mengedit status task
$routes->get('/status_task/edit_status_task/(:num)', 'StatusTask::edit_status_task/$1'); //Akses beres udah dibikin filter/middleware khususAdmin
$routes->post('/status_task/update_status_task', 'StatusTask::update_status_task'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menghapus status task
// $routes->delete('/status_task/delete_status_task/(:num)', 'StatusTask::delete_status_task/$1');

//Routes Kategori Task
//Untuk menampilkan halaman daftar kategori task
$routes->get('/kategori_task/daftar_kategori_task', 'KategoriTask::daftar_kategori_task'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menambah kategori task
$routes->post('/kategori_task/tambah_kategori_task', 'KategoriTask::tambah_kategori_task'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk mengedit kategori task
$routes->get('/kategori_task/edit_kategori_task/(:num)', 'KategoriTask::edit_kategori_task/$1'); //Akses beres udah dibikin filter/middleware khususAdmin
$routes->post('/kategori_task/update_kategori_task', 'KategoriTask::update_kategori_task'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menghapus kategori task
$routes->delete('/kategori_task/delete_kategori_task/(:num)', 'KategoriTask::delete_kategori_task/$1'); //Akses beres udah dibikin filter/middleware khususAdmin

//Routes Hari Libur
//Untuk menampilkan halaman daftar hari libur
$routes->get('/hari_libur/daftar_hari_libur', 'HariLibur::daftar_hari_libur'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menambah hari libur
$routes->post('/hari_libur/tambah_hari_libur', 'HariLibur::tambah_hari_libur/$1'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk mengedit hari libur
$routes->get('/hari_libur/edit_hari_libur/(:num)', 'HariLibur::edit_hari_libur/$1'); //Akses beres udah dibikin filter/middleware khususAdmin
$routes->post('/hari_libur/update_hari_libur', 'HariLibur::update_hari_libur'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menghapus hari libur
$routes->delete('/hari_libur/delete_hari_libur/(:num)', 'HariLibur::delete_hari_libur/$1'); //Akses beres udah dibikin filter/middleware khususAdmin

//Routes Usergroup
//Untuk menampilkan halaman daftar usergroup
$routes->get('/usergroup/daftar_usergroup', 'Usergroup::daftar_usergroup'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menambah usergroup
// $routes->post('/usergroup/tambah_usergroup', 'Usergroup::tambah_usergroup');
//Untuk mengedit usergroup
$routes->get('/usergroup/edit_usergroup/(:num)', 'Usergroup::edit_usergroup/$1'); //Akses beres udah dibikin filter/middleware khususAdmin
$routes->post('/usergroup/update_usergroup', 'Usergroup::update_usergroup'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menghapus usergroup
// $routes->delete('/usergroup/delete_usergroup/(:num)', 'Usergroup::delete_usergroup/$1');
//Untuk melihat detail usergroup
$routes->get('/usergroup/detail_usergroup/(:num)', 'Usergroup::detail_usergroup/$1'); //Akses beres udah dibikin filter/middleware khususAdmin

//Rotes User
//Untuk menampilkan halaman user
$routes->get('/user/daftar_user', 'User::daftar_user'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menambah user
$routes->post('/user/tambah_user', 'User::tambah_user'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk mengedit user
$routes->get('/user/edit_user/(:num)', 'User::edit_user/$1'); //Akses beres udah dibikin filter/middleware khususAdmin
$routes->post('/user/update_user', 'User::update_user'); //Akses beres udah dibikin filter/middleware khususAdmin
//Untuk menghapus user
$routes->delete('/user/delete_user/(:num)', 'User::delete_user/$1'); //Akses beres udah dibikin filter/middleware khususAdmin

//Routes target poin harian
//Untuk menampilkan halaman target poin harian
$routes->get('/target_poin_harian/daftar_target_poin_harian', 'TargetPoinHarian::daftar_target_poin_harian'); //Akses beres udah dibikin filter/middleware khususHODandDireksi
//Untuk menambah target poin harian
$routes->post('/target_poin_harian/tambah_target_poin_harian', 'TargetPoinHarian::tambah_target_poin_harian'); //Akses beres udah dibikin filter/middleware khususHODandDireksi
//Untuk mengedit target poin harian
$routes->get('/target_poin_harian/edit_target_poin_harian/(:num)', 'TargetPoinHarian::edit_target_poin_harian/$1'); //Akses beres udah dibikin filter/middleware khususHODandDireksi
$routes->post('/target_poin_harian/update_target_poin_harian', 'TargetPoinHarian::update_target_poin_harian'); //Akses beres udah dibikin filter/middleware khususHODandDireksi
//Untuk menghapus target poin harian
$routes->delete('/target_poin_harian/delete_target_poin_harian/(:num)', 'TargetPoinHarian::delete_target_poin_harian/$1'); //Akses beres udah dibikin filter/middleware khususHODandDireksi
//Untuk memfilter data yang ditampilkan
$routes->get('/target_poin_harian/filter_target_poin_harian', 'TargetPoinHarian::filter_target_poin_harian'); //Akses beres udah dibikin filter/middleware khususHODandDireksi

//Routes bobot kategori task
//Untuk menampilkan halaman bobot kategori task
$routes->get('/bobot_kategori_task/daftar_bobot_kategori_task', 'BobotKategoriTask::daftar_bobot_kategori_task'); //Akses beres udah dibikin filter/middleware khususHOD
//Untuk menambah bobot kategori task
$routes->post('/bobot_kategori_task/tambah_bobot_kategori_task', 'BobotKategoriTask::tambah_bobot_kategori_task'); //Akses beres udah dibikin filter/middleware khususHOD
//Untuk mengedit bobot kategori task
$routes->get('/bobot_kategori_task/edit_bobot_kategori_task/(:num)/(:num)', 'BobotKategoriTask::edit_bobot_kategori_task/$1/$2'); //Akses beres udah dibikin filter/middleware khususHOD
$routes->post('/bobot_kategori_task/update_bobot_kategori_task', 'BobotKategoriTask::update_bobot_kategori_task'); //Akses beres udah dibikin filter/middleware khususHOD
//Untuk menghapus bobot kategori task
$routes->delete('/bobot_kategori_task/delete_bobot_kategori_task/(:num)/(:num)', 'BobotKategoriTask::delete_bobot_kategori_task/$1/$2'); //Akses beres udah dibikin filter/middleware khususHOD
//Untuk memfilter data yang ditampilkan
$routes->get('/bobot_kategori_task/filter_bobot_kategori_task', 'BobotKategoriTask::filter_bobot_kategori_task'); //Akses beres udah dibikin filter/middleware khususHOD
//Untuk melihat detail bobot kategori task
$routes->get('/bobot_kategori_task/detail_bobot_kategori_task/(:num)/(:num)', 'BobotKategoriTask::detail_bobot_kategori_task/$1/$2'); //Akses beres udah dibikin filter/middleware khususHOD


//Routes Profile
//Untuk menampilkan halaman profile
$routes->get('/profile/lihat_profil', 'Profile::lihat_profile'); //Akses beres tidak perlu diberi filter/middleware, hal ini karena semua orang bisa lihat profile tergantung session yang login
//Untuk mengupdate password
$routes->post('/profile/update_password', 'Profile::update_password'); //Akses beres tidak perlu diberi filter/middleware, hal ini karena semua orang bisa update password tergantung session yang login
//Untuk mengupdate profile
$routes->post('/profile/update_profile', 'Profile::update_profile'); //Akses beres tidak perlu diberi filter/middleware, hal ini karena semua orang bisa update profile tergantung session yang login





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
   $routes->get('user/(:num)', 'UserController::show/$1');
   $routes->put('user/(:num)', 'UserController::update/$1');
   $routes->post('user/fotoprofil', 'UserController::uploadfoto');
   $routes->post('user/cekemail', 'UserController::cekemail');

   //ganti password
   $routes->put('gantipassword', 'GantiPasswordController::index');



   //pekerjaan
   // $routes->get('pekerjaan', 'PekerjaanController::index');
   $routes->get('pekerjaan/(:num)', 'PekerjaanController::show/$1');
   $routes->get('pekerjaanpersonil/(:num)', 'PekerjaanController::personil/$1');
   $routes->get('pekerjaanbyuser/(:num)', 'PekerjaanController::showPekerjaan/$1');
   $routes->put('pekerjaan/(:num)', 'PekerjaanController::update/$1'); //edit pekerjaan
   $routes->get('pekerjaan/verifikasi/(:num)', 'PekerjaanController::showPekerjaanVerifikasi/$1'); //data task yang perlu diverifikasi
   $routes->get('pekerjaan/verifikator/(:num)', 'PekerjaanController::showPekerjaanVerifikator/$1'); //data task yang perlu diverifikasi

   //task
   $routes->get('task/(:num)', 'TaskController::show/$1');
   $routes->get('taskbypekerjaan/(:num)', 'TaskController::showTaskByPekerjaan/$1'); //data task berdasarkan pekerjaan
   $routes->get('taskbyuser/(:num)', 'TaskController::showTaskByUser/$1'); //data task berdasarkan user
   $routes->get('taskbyuser/overdue/(:num)', 'TaskController::showTaskOverdueByUser/$1'); //data task berdasarkan user
   $routes->get('task/verifikasi/(:num)', 'TaskController::showTaskVerifikasi/$1'); //data task yang perlu diverifikasi
   $routes->put('task/verifikasi/tolak/(:num)', 'TaskController::tolakverifikasi/$1'); //data task yang perlu diverifikasi
   $routes->put('task/verifikasi/terima/(:num)', 'TaskController::terimaverifikasi/$1'); //data task yang perlu diverifikasi
   $routes->get('task/verifikator/(:num)', 'TaskController::showTaskByVerifikator/$1'); //data task yang perlu diverifikasi
   $routes->get('task/rekappoint/(:num)', 'TaskController::rekappoint/$1');
   // $routes->get('task/rekappoint/user/(:num)', 'TaskController::rekappointUser/$1');
   // $routes->get('task/rekappoint/usergroup/(:num)', 'TaskController::rekappointUserGroup/$1');
   $routes->post('task', 'TaskController::create');
   $routes->put('task/(:num)', 'TaskController::update/$1'); //edit task
   $routes->post('task/submit', 'TaskController::submit'); //submit bukti selesai task
   $routes->delete('task/(:num)', 'TaskController::delete/$1');

   //bobot kategori task
   $routes->get('bobotkategoritask/(:num)', 'BobotKategoriTaskController::show/$1');
   $routes->get('bobotkategoritask/cekbobot/pm', 'BobotKategoriTaskController::cekbobotpm');
   $routes->get('bobotkategoritask/cekbobot/individu/(:num)', 'BobotKategoriTaskController::cekbobotindividu/$1');

   //hari libur
   $routes->get('harilibur', 'HariLiburController::index');

   //kategori task
   $routes->get('kategoritask', 'KategoriTaskController::index');

   //kinerja
   $routes->get('kinerja/(:num)', 'KinerjaController::show/$1');
   $routes->get('kinerjauser/(:num)', 'KinerjaController::kinerjauser/$1');

   //status pekerjaan
   $routes->get('statuspekerjaan', 'StatusPekerjaanController::index');

   //status task
   $routes->get('statustask', 'StatusTaskController::index');
   $routes->get('statustask/(:num)', 'StatusTaskController::show/$1');

   //target poin harian\
   $routes->get('targetpoinharian/(:num)', 'TargetPoinHarianController::targetpoinharianbyuser/$1');
   $routes->get('targetpoinharian/cek/pm', 'TargetPoinHarianController::cektargetpoinharianpm');
   $routes->get('targetpoinharian/cek/individu/(:num)', 'TargetPoinHarianController::cektargetpoinharianindividu/$1');
});
