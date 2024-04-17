<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class StatusPekerjaanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_status_pekerjaan'      => 'Presales',
                'deskripsi_status_pekerjaan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_status_pekerjaan'      => 'On Progress',
                'deskripsi_status_pekerjaan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum laborum',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_status_pekerjaan'      => 'Bast',
                'deskripsi_status_pekerjaan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ipsam',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_status_pekerjaan'      => 'Support',
                'deskripsi_status_pekerjaan' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem veritatis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_status_pekerjaan'      => 'Cancel',
                'deskripsi_status_pekerjaan' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem veritatis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ]
        ];
        $this->db->table('status_pekerjaan')->insertBatch($data);
    }
}