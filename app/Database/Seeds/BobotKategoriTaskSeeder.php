<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class BobotKategoriTaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori_task' => 1,
                'id_usergroup'     => 1,
                'tahun'            => 2023,
                'bobot_poin'       => 6,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_kategori_task' => 2,
                'id_usergroup'     => 1,
                'tahun'            => 2023,
                'bobot_poin'       => 7,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_kategori_task' => 3,
                'id_usergroup'     => 1,
                'tahun'            => 2023,
                'bobot_poin'       => 6,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_kategori_task' => 4,
                'id_usergroup'     => 1,
                'tahun'            => 2023,
                'bobot_poin'       => 5,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_kategori_task' => 5,
                'id_usergroup'     => 1,
                'tahun'            => 2023,
                'bobot_poin'       => 8,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_kategori_task' => 1,
                'id_usergroup'     => 2,
                'tahun'            => 2024,
                'bobot_poin'       => 7,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_kategori_task' => 2,
                'id_usergroup'     => 2,
                'tahun'            => 2024,
                'bobot_poin'       => 8,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_kategori_task' => 3,
                'id_usergroup'     => 2,
                'tahun'            => 2024,
                'bobot_poin'       => 7,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_kategori_task' => 4,
                'id_usergroup'     => 2,
                'tahun'            => 2024,
                'bobot_poin'       => 6,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_kategori_task' => 5,
                'id_usergroup'     => 2,
                'tahun'            => 2024,
                'bobot_poin'       => 6,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ]
        ];
        $this->db->table('bobot_kategori_task')->insertBatch($data);
    }
}
