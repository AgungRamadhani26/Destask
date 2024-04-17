<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class StatusTaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_status_task'        => 1, // 1 => 'On Progres'
                'nama_status_task'      => 'On Progres',
                'deskripsi_status_task' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_status_task'        => 2, // 2 => 'Selesai'
                'nama_status_task'      => 'Selesai',
                'deskripsi_status_task' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum laborum',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_status_task'        => 3, // 3 => 'Pending'
                'nama_status_task'      => 'Pending',
                'deskripsi_status_task' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ipsam',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_status_task'        => 4, // 4 => 'Cancle'
                'nama_status_task'      => 'Cancel',
                'deskripsi_status_task' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem veritatis',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
        ];
        $this->db->table('status_task')->insertBatch($data);
    }
}