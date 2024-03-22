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
                'nama_kategori_pekerjaan'      => 'High',
                'deskripsi_kategori_pekerjaan' => 'Pekerjaan dengan prioritas tinggi memerlukan penyelesaian segera dan memiliki dampak besar terhadap keseluruhan proyek atau operasi perusahaan. Membutuhkan alokasi tim dan sumber daya segera untuk menyelesaikan pekerjaan tersebut',
                'color'               => '#dc3545',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_kategori_pekerjaan'      => 'Medium',
                'deskripsi_kategori_pekerjaan' => 'Pekerjaan dengan prioritas sedang memiliki dampak yang signifikan terhadap operasi perusahaan atau proyek, namun tidak memerlukan penyelesaian segera seperti pekerjaan dengan prioritas tinggi. Tim dan sumber daya harus dialokasikan dengan cermat untuk menyelesaikan pekerjaan dengan prioritas sedang ini agar dapat memastikan kelancaran operasi dan kemajuan proyek secara keseluruhan.',
                'color'               => '#fd7e14',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama_kategori_pekerjaan'      => 'Low',
                'deskripsi_kategori_pekerjaan' => 'Pekerjaan dengan prioritas rendah adalah pekerjaan yang memiliki dampak minimal terhadap operasi perusahaan atau proyek dan dapat ditunda atau dilakukan dengan fleksibilitas waktu. Pekerjaan dengan prioritas rendah dapat dilakukan ketika sumber daya atau waktu tersedia setelah pekerjaan dengan prioritas tinggi dan sedang selesai.',
                'color'               => '#0d6efd',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ]
        ];
        $this->db->table('kategori_pekerjaan')->insertBatch($data);
    }
}
