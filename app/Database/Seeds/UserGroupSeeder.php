<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_usergroup' => 1,
                'nama_usergroup'      => 'Design',
                'deskripsi_usergroup' => 'Divisi Design bertanggung jawab untuk merancang antarmuka pengguna yang menarik dan fungsional, memastikan pengalaman online yang optimal bagi pengguna.',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_usergroup' => 2,
                'nama_usergroup'      => 'Web',
                'deskripsi_usergroup' => 'Divisi Pengembangan Web bertanggung jawab merancang dan memelihara infrastruktur teknis situs web. Mereka mengimplementasikan desain menggunakan bahasa pemrograman terkini, bekerja sama dengan divisi desain, dan memastikan keamanan serta kinerja situs optimal.',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_usergroup' => 3,
                'nama_usergroup'      => 'Mobile',
                'deskripsi_usergroup' => 'Divisi Mobile menciptakan aplikasi inovatif dengan antarmuka responsif. Tim fokus pada kebutuhan pengguna dan selalu mengikuti perkembangan teknologi mobile. Tujuannya: memberikan pengalaman pengguna terbaik.',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_usergroup' => 4,
                'nama_usergroup'      => 'Tester',
                'deskripsi_usergroup' => 'Divisi Tester bertanggung jawab untuk melakukan pengujian perangkat lunak secara menyeluruh sebelum dirilis ke pengguna akhir. Tugas utama divisi ini adalah memverifikasi kepatuhan perangkat lunak terhadap spesifikasi yang telah ditetapkan, menemukan dan melaporkan bug atau masalah fungsional, serta memastikan bahwa perangkat lunak berfungsi sesuai dengan harapan.',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_usergroup' => 5,
                'nama_usergroup'      => 'Admin',
                'deskripsi_usergroup' => 'Divisi Admin bertanggung jawab untuk mengelola dan menjaga infrastruktur serta sumber daya yang digunakan dalam organisasi. Tugas-tugas divisi ini meliputi administrasi server, manajemen database, manajemen jaringan, manajemen perangkat keras dan perangkat lunak, serta pemeliharaan keamanan sistem.',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_usergroup' => 6,
                'nama_usergroup'      => 'Helpdesk',
                'deskripsi_usergroup' => 'Divisi Helpdesk bertanggung jawab untuk memberikan dukungan teknis dan bantuan kepada pengguna akhir yang mengalami masalah atau kesulitan saat menggunakan produk atau layanan perusahaan. Tugas utama divisi ini adalah merespons pertanyaan, permintaan bantuan, dan pelaporan masalah dari pengguna, serta memberikan solusi atau bantuan teknis yang diperlukan.',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ]
        ];
        $this->db->table('usergroup')->insertBatch($data);
    }
}
