<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class KategoriPekerjaanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kategori_pekerjaan'      => 'High',
                'deskripsi_kategori_pekerjaan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_kategori_pekerjaan'      => 'Medium',
                'deskripsi_kategori_pekerjaan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum laborum',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_kategori_pekerjaan'      => 'Low',
                'deskripsi_kategori_pekerjaan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ipsam',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ]
        ];
        $this->db->table('kategori_pekerjaan')->insertBatch($data);
    }
}
