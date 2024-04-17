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
                'deskripsi_kategori_task' => 'Task dalam kategori ini berkaitan dengan memberikan dukungan teknis atau bantuan kepada pengguna atau klien setelah implementasi atau penggunaan produk atau layanan.',
                'color'               => '#0d6efd',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_kategori_task'        => 2, // 2 => 'Analisa'
                'nama_kategori_task'      => 'Analisa',
                'deskripsi_kategori_task' => 'Task dalam kategori ini berkaitan dengan analisis kebutuhan, persyaratan, atau masalah yang muncul dalam proyek atau operasi.',
                'color'               => '#d63384',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_kategori_task'        => 3, // 3 => 'Coding'
                'nama_kategori_task'      => 'Coding',
                'deskripsi_kategori_task' => 'Task dalam kategori ini berkaitan dengan menulis kode atau mengembangkan solusi perangkat lunak berdasarkan spesifikasi atau kebutuhan yang telah ditentukan.',
                'color'               => '#6f42c1',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_kategori_task'        => 4, // 4 => 'Testing'
                'nama_kategori_task'      => 'Testing',
                'deskripsi_kategori_task' => 'Task dalam kategori ini berkaitan dengan pengujian perangkat lunak untuk memastikan bahwa fungsi atau fitur yang dikembangkan berfungsi dengan baik dan sesuai dengan harapan.',
                'color'               => '#6610f2',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_kategori_task'        => 5, // 5 => 'Dokumentasi'
                'nama_kategori_task'      => 'Dokumentasi',
                'deskripsi_kategori_task' => 'Task dalam kategori ini berkaitan dengan pembuatan dokumentasi yang diperlukan dalam proyek atau operasi, seperti dokumentasi teknis, dokumentasi pengguna, atau laporan proyek.',
                'color'               => '#0dcaf0',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ]
        ];
        $this->db->table('kategori_task')->insertBatch($data);
    }
}