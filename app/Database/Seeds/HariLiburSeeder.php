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
                'tanggal_libur'   => '2024-02-14',
                'keterangan'      => 'Pemilihan Umum',
                'created_at'      => Time::now(),
                'updated_at'      => Time::now()
            ],
            [
                'tanggal_libur'   => '2024-02-08',
                'keterangan'      => 'Hari Pahlawan',
                'created_at'      => Time::now(),
                'updated_at'      => Time::now()
            ],
            [
                'tanggal_libur'   => '2024-03-20',
                'keterangan'      => 'Kenaikan Isa Al-Masih',
                'created_at'      => Time::now(),
                'updated_at'      => Time::now()
            ],
        ];
        $this->db->table('hari_libur')->insertBatch($data);
    }
}
