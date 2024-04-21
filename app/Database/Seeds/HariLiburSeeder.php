<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class HariLiburSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_hari_libur'   => 1,
                'tanggal_libur'   => '2024-02-14',
                'keterangan'      => 'Pemilihan Umum',
                'created_at'      => Time::now(),
                'updated_at'      => Time::now()
            ],
            [
                'id_hari_libur'   => 2,
                'tanggal_libur'   => '2024-02-08',
                'keterangan'      => 'Hari Pahlawan',
                'created_at'      => Time::now(),
                'updated_at'      => Time::now()
            ],
            [
                'id_hari_libur'   => 3,
                'tanggal_libur'   => '2024-03-20',
                'keterangan'      => 'Kenaikan Isa Al-Masih',
                'created_at'      => Time::now(),
                'updated_at'      => Time::now()
            ],
            [
                'id_hari_libur'   => 4,
                'tanggal_libur'   => '2024-04-03',
                'keterangan'      => 'Maulid Nabi Muhammad SAW',
                'created_at'      => Time::now(),
                'updated_at'      => Time::now()
            ],
            [
                'id_hari_libur'   => 5,
                'tanggal_libur'   => '2024-04-25',
                'keterangan'      => 'Kemerdekaan Republik Indonesia',
                'created_at'      => Time::now(),
                'updated_at'      => Time::now()
            ],
        ];
        $this->db->table('hari_libur')->insertBatch($data);
    }
}
