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
                'nama_status_task'      => 'Pending',
                'deskripsi_status_task' => 'Task belum dapat diselesaika, biasanya, task dalam status ini memerlukan tindakan atau keputusan tambahan sebelum dapat dilanjutkan atau diselesaikan.',
                'color'               => '#fd7e14',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_status_task'      => 'On Progres',
                'deskripsi_status_task' => 'Task sedang dalam proses pengerjaan atau pelaksanaan, biasanya, task dalam status ini sedang berada di tengah-tengah proses dan memerlukan waktu untuk diselesaikan.',
                'color'               => '#ffc107',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_status_task'      => 'Selesai',
                'deskripsi_status_task' => 'Task telah diselesaikan sepenuhnya dan telah memenuhi semua persyaratan atau kriteria yang telah ditetapkan.',
                'color'               => '#198754',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_status_task'      => 'Cancle',
                'deskripsi_status_task' => 'Task dibatalkan sebelum selesai atau sebelum mencapai tahap berikutnya, task tersebut tidak akan dilanjutkan lagi dan biasanya dihapus dari daftar tugas.',
                'color'               => '#dc3545',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ]
        ];
        $this->db->table('status_task')->insertBatch($data);
    }
}
