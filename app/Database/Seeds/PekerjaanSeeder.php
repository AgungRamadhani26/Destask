<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_pekerjaan'      => 1,
                'id_status_pekerjaan' => 1,
                'id_kategori_pekerjaan' => 1,
                'nama_pekerjaan' => 'Membuat Laporan',
                'pelanggan' => 'PT. ABC',
                'jenis_layanan' => 'Laporan Keuangan',
                'nominal_harga' => 1000000,
                'deskripsi_pekerjaan' => 'Membuat laporan keuangan bulanan',
                'target_waktu_selesai' => Time::now(),
                'persentase_selesai' => 0,
                'waktu_selesai' => null,
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'id_pekerjaan'      => 2,
                'id_status_pekerjaan' => 1,
                'id_kategori_pekerjaan' => 1,
                'nama_pekerjaan' => 'Aplikasi Pembukuan',
                'pelanggan' => 'PT. XCV',
                'jenis_layanan' => 'Aplikasi Pembukuan',
                'nominal_harga' => 1000000,
                'deskripsi_pekerjaan' => 'Membuat Template Aplikasi Pembukuan',
                'target_waktu_selesai' => Time::now(),
                'persentase_selesai' => 0,
                'waktu_selesai' => null,
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            
        ];
        $this->db->table('pekerjaan')->insertBatch($data);
    }
}