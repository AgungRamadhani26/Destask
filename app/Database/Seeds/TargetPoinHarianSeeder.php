<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class TargetPoinHarianSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_usergroup'               => 1,
                'tahun'                      => '2023',
                'bulan'                      => '2',
                'jumlah_target_poin_harian'  => 32,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 768,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 1,
                'tahun'                      => '2024',
                'bulan'                      => '2',
                'jumlah_target_poin_harian'  => 35,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 840,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 1,
                'tahun'                      => '2024',
                'bulan'                      => '4',
                'jumlah_target_poin_harian'  => 30,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 720,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 2,
                'tahun'                      => '2024',
                'bulan'                      => '2',
                'jumlah_target_poin_harian'  => 30,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 720,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 2,
                'tahun'                      => '2024',
                'bulan'                      => '4',
                'jumlah_target_poin_harian'  => 37,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 888,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 3,
                'tahun'                      => '2024',
                'bulan'                      => '3',
                'jumlah_target_poin_harian'  => 36,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 864,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 3,
                'tahun'                      => '2024',
                'bulan'                      => '4',
                'jumlah_target_poin_harian'  => 40,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 960,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 4,
                'tahun'                      => '2024',
                'bulan'                      => '3',
                'jumlah_target_poin_harian'  => 33,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 792,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 4,
                'tahun'                      => '2024',
                'bulan'                      => '4',
                'jumlah_target_poin_harian'  => 40,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 960,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 5,
                'tahun'                      => '2024',
                'bulan'                      => '2',
                'jumlah_target_poin_harian'  => 35,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 840,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 5,
                'tahun'                      => '2024',
                'bulan'                      => '4',
                'jumlah_target_poin_harian'  => 36,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 864,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 6,
                'tahun'                      => '2024',
                'bulan'                      => '1',
                'jumlah_target_poin_harian'  => 36,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 864,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ],
            [
                'id_usergroup'               => 6,
                'tahun'                      => '2024',
                'bulan'                      => '4',
                'jumlah_target_poin_harian'  => 30,
                'jumlah_hari_kerja'          => 24,
                'jumlah_hari_libur'          => 6,
                'jumlah_target_poin_sebulan' => 720,
                'created_at'                 => Time::now(),
                'updated_at'                 => Time::now()
            ]
        ];
        $this->db->table('target_poin_harian')->insertBatch($data);
    }
}