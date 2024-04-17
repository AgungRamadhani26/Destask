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
                'id_usergroup'        => 1,
                'nama_usergroup'      => 'Web Design',
                'deskripsi_usergroup' => 'Web Design bertanggung jawab untuk merancang antarmuka pengguna yang menarik dan fungsional, memastikan pengalaman online yang optimal bagi pengguna.',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_usergroup'        => 2,
                'nama_usergroup'      => 'Web',
                'deskripsi_usergroup' => 'Divisi Pengembangan Web bertanggung jawab merancang dan memelihara infrastruktur teknis situs web. Mereka mengimplementasikan desain menggunakan bahasa pemrograman terkini, bekerja sama dengan divisi desain, dan memastikan keamanan serta kinerja situs optimal.',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_usergroup'        => 3,
                'nama_usergroup'      => 'Mobile',
                'deskripsi_usergroup' => 'Divisi Mobile menciptakan aplikasi inovatif dengan antarmuka responsif. Tim fokus pada kebutuhan pengguna dan selalu mengikuti perkembangan teknologi mobile. Tujuannya: memberikan pengalaman pengguna terbaik.',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ]
        ];
        $this->db->table('usergroup')->insertBatch($data);
    }
}