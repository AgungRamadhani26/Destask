<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_task'        => 1,
                'id_pekerjaan'      => 1,
                'id_user'      => 1,
                'id_status_task'      => 1,
                'id_kategori_task'      => 1,
                'tgl_planing'      => Time::now(),
                'status_verifikasi'      => 0,
                'persentase_selesai'      => 100,
                'deskripsi_task'      => 'membuat aplikasi',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];
        $this->db->table('task')->insertBatch($data);
    }
}