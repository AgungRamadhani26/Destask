<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\JwtFilter;
use App\Filters\Cors;
use App\Filters\KhususAdmin;
use App\Filters\KhususHOD;
use App\Filters\KhususHODandAdmin;
use App\Filters\KhususHODandDireksi;
use App\Filters\KhususPengguna;
use App\Filters\PendukungAutentikasi;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, array<int, string>|string> [filter_name => classname]
     *                                               or [filter_name => [classname1, classname2, ...]]
     * @phpstan-var array<string, class-string|list<class-string>>
     */
    public array $aliases = [
        'csrf'                 => CSRF::class,
        'toolbar'              => DebugToolbar::class,
        'honeypot'             => Honeypot::class,
        'invalidchars'         => InvalidChars::class,
        'secureheaders'        => SecureHeaders::class,
        'jwtfilter'            => JwtFilter::class,
        'cors'                 => Cors::class,
        'khususPengguna'       => KhususPengguna::class,
        'khususAdmin'          => KhususAdmin::class,
        'khususHOD'            => KhususHOD::class,
        'pendukungAutentikasi' => PendukungAutentikasi::class,
        'khususHODandDireksi'  => KhususHODandDireksi::class,
        'khususHODandAdmin'    => KhususHODandAdmin::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, array<string>>
     * @phpstan-var array<string, list<string>>|array<string, array<string, array<string, string>>>
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            'csrf' => [
                'except' => [
                    'lupapassword', 'lupapassword/verifikasitoken', 'lupapassword/resetpassword',
                    'api/*', 'authlogin', 'authcekuser',
                ]
            ],
            'pendukungAutentikasi' => [
                'except' => [
                    '/', '/login', '/lupa_password', '/lupa_password/cek_email', '/lupa_password/reset_password/*',
                    '/lupa_password/save_reset_password/*', '/lupa_password/result_reset_password', 'api/*',
                    'lupapassword', 'lupapassword/verifikasitoken', 'lupapassword/resetpassword',
                    'api/*', 'authlogin', 'authcekuser',
                ]
            ]
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [
        'jwtfilter' => [
            'before' => [
                'api/*',
                'authlogin',
                'cekuser',
                'lupapassword/*',
            ]
        ],
        'cors' => [
            'before' => [
                'api/*',
            ]
        ],
        'khususAdmin' => [
            'before' => [
                '/status_pekerjaan/daftar_status_pekerjaan', '/status_pekerjaan/update_status_pekerjaan', '/status_pekerjaan/edit_status_pekerjaan/*',
                '/kategori_pekerjaan/daftar_kategori_pekerjaan', '/kategori_pekerjaan/update_kategori_pekerjaan', '/kategori_pekerjaan/edit_kategori_pekerjaan/*',
                '/status_task/daftar_status_task', '/status_task/update_status_task', '/status_task/edit_status_task/*', '/kategori_task/daftar_kategori_task',
                '/kategori_task/tambah_kategori_task', '/kategori_task/update_kategori_task', '/kategori_task/edit_kategori_task/*', '/kategori_task/delete_kategori_task/*',
                '/hari_libur/daftar_hari_libur', '/hari_libur/tambah_hari_libur', '/hari_libur/edit_hari_libur/*', '/hari_libur/update_hari_libur', '/hari_libur/delete_hari_libur/*',
                '/user/daftar_user', '/user/tambah_user', '/user/edit_user/*', '/user/update_user', '/user/delete_user/*', '/usergroup/daftar_usergroup', '/usergroup/edit_usergroup/*',
                '/usergroup/update_usergroup', '/usergroup/detail_usergroup/*'
            ],
        ],
        'khususHOD' => [
            'before' => [
                '/bobot_kategori_task/daftar_bobot_kategori_task', '/bobot_kategori_task/tambah_bobot_kategori_task', '/bobot_kategori_task/edit_bobot_kategori_task/*',
                '/bobot_kategori_task/update_bobot_kategori_task', '/bobot_kategori_task/delete_bobot_kategori_task/*', '/bobot_kategori_task/filter_bobot_kategori_task',
                '/bobot_kategori_task/detail_bobot_kategori_task/*'
            ]
        ],
        'khususHODandDireksi' => [
            'before' => [
                '/target_poin_harian/daftar_target_poin_harian', '/target_poin_harian/tambah_target_poin_harian', '/target_poin_harian/edit_target_poin_harian/*',
                '/target_poin_harian/update_target_poin_harian', '/target_poin_harian/delete_target_poin_harian/*', '/target_poin_harian/filter_target_poin_harian',
            ]
        ],
        'khususHODandAdmin' => [
            'before' => [
                '/pekerjaan/add_pekerjaan', '/pekerjaan/tambah_pekerjaan', '/pekerjaan/edit_pekerjaan/*', '/pekerjaan/update_pekerjaan', '/pekerjaan/editpekerjaan_status_pekerjaan/*',
                '/pekerjaan/updatepekerjaan_status_pekerjaan', '/pekerjaan/delete_pekerjaan/*', '/pekerjaan/edit_personil_pekerjaan/*', '/personil/edit_personil/*', '/personil/update_personil',
                '/personil/tambah_personil_desainer', '/personil/tambah_personil_be_web', '/personil/tambah_personil_fe_web', '/personil/tambah_personil_be_mobile', '/personil/tambah_personil_fe_mobile',
                '/personil/tambah_personil_tester', '/personil/tambah_personil_admin', '/personil/tambah_personil_helpdesk', '/personil/delete_personil/*'
            ]
        ]
    ];
}
