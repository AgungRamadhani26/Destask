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
                'id_status_task' => 1,
                'nama_status_task'      => 'On Progres',
                'deskripsi_status_task' => 'Task sedang dalam proses pengerjaan atau pelaksanaan, biasanya, task dalam status ini sedang berada di tengah-tengah proses dan memerlukan waktu untuk diselesaikan.',
                'color'               => '#ffc107',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_status_task' => 2,
                'nama_status_task'      => 'Pending',
                'deskripsi_status_task' => 'Task sedang dalam proses menunggu verifikasi. Proses verifikasi dilakukan oleh supervisi yang terdaftar pada pekerjaan yang berkaitan dengan task tersebut.',
                'color'               => '#fd7e14',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_status_task' => 3,
                'nama_status_task'      => 'Selesai',
                'deskripsi_status_task' => 'Task telah diselesaikan sepenuhnya dan telah memenuhi semua persyaratan atau kriteria yang telah ditetapkan.',
                'color'               => '#198754',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_status_task' => 4,
                'nama_status_task'      => 'Cancel',
                'deskripsi_status_task' => 'Task ditolak atau tidak lolos verifikasi, disini pengguna harus melakukan submit ulang task sesuai kriteria dan masukan yang diberikan supervisi.',
                'color'               => '#dc3545',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
        ];
        $this->db->table('status_task')->insertBatch($data);
    }
}
