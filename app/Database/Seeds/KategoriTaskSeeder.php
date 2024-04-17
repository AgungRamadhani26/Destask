<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class KategoriTaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori_task'        => 1, // 1 => 'Support
                'nama_kategori_task'      => 'Support',
                'deskripsi_kategori_task' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_kategori_task'        => 2, // 2 => 'Analisa'
                'nama_kategori_task'      => 'Analisa',
                'deskripsi_kategori_task' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum laborum',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_kategori_task'        => 3, // 3 => 'Coding'
                'nama_kategori_task'      => 'Coding',
                'deskripsi_kategori_task' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ipsam',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_kategori_task'        => 4, // 4 => 'Testing'
                'nama_kategori_task'      => 'Testing',
                'deskripsi_kategori_task' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem veritatis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_kategori_task'        => 5, // 5 => 'Dokumentasi'
                'nama_kategori_task'      => 'Dokumentasi',
                'deskripsi_kategori_task' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem veritatis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ]
        ];
        $this->db->table('kategori_task')->insertBatch($data);
    }
}