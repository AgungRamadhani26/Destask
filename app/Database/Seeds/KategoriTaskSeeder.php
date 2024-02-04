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
                'nama_kategori_task'      => 'Support',
                'deskripsi_kategori_task' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_kategori_task'      => 'Analisa',
                'deskripsi_kategori_task' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum laborum',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_kategori_task'      => 'Coding',
                'deskripsi_kategori_task' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ipsam',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_kategori_task'      => 'Testing',
                'deskripsi_kategori_task' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem veritatis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_kategori_task'      => 'Dokumentasi',
                'deskripsi_kategori_task' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem veritatis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ]
        ];
        $this->db->table('kategori_task')->insertBatch($data);
    }
}
