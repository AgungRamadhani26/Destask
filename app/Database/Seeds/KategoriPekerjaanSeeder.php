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
                'id_kategori_pekerjaan'        => 1, // 1 => 'High
                'nama_kategori_pekerjaan'      => 'High',
                'deskripsi_kategori_pekerjaan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_kategori_pekerjaan'        => 2, // 2 => 'Medium
                'nama_kategori_pekerjaan'      => 'Medium',
                'deskripsi_kategori_pekerjaan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum laborum',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_kategori_pekerjaan'        => 3, // 3 => 'Low
                'nama_kategori_pekerjaan'      => 'Low',
                'deskripsi_kategori_pekerjaan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ipsam',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ]
        ];
        $this->db->table('kategori_pekerjaan')->insertBatch($data);
    }
}