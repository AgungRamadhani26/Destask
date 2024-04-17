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
                'deskripsi_status_pekerjaan' => 'Tahap awal sebelum proyek dimulai secara resmi. Biasanya melibatkan aktivitas seperti presentasi, negosiasi, dan penawaran kepada klien.',
                'color'               => '#fd7e14',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_status_pekerjaan'      => 'On Progres',
                'deskripsi_status_pekerjaan' => 'Pekerjaan sedang dalam proses pengerjaan atau pelaksanaan. Tim atau individu sedang aktif dalam menyelesaikan tugas yang ditugaskan.',
                'color'               => '#ffc107',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_status_pekerjaan'      => 'BAST',
                'deskripsi_status_pekerjaan' => 'Tahap di mana pekerjaan telah selesai dan diserahkan kepada klien. Tahap ini merupakan serah terima pekerjaan antara pihak yang memberikan jasa dengan pihak yang menerima jasa.',
                'color'               => '#198754',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_status_pekerjaan'      => 'Support',
                'deskripsi_status_pekerjaan' => 'Tahap setelah penyelesaian proyek di mana pihak penyedia layanan memberikan dukungan teknis atau bantuan tambahan kepada klien. Biasanya melibatkan penyelesaian bug, pelatihan, atau perbaikan kecil setelah implementasi.',
                'color'               => '#0d6efd',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_status_pekerjaan'      => 'Cancel',
                'deskripsi_status_pekerjaan' => 'Pekerjaan dibatalkan sebelum selesai atau sebelum mencapai tahap berikutnya. Pekerjaan cancle tidak akan dikerjakan oleh tim.',
                'color'               => '#dc3545',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ]
        ];
        $this->db->table('status_pekerjaan')->insertBatch($data);
    }
}