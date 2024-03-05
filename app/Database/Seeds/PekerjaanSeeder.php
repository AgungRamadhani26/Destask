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
                'id_status_pekerjaan' => 2,
                'id_kategori_pekerjaan' => 2,
                'nama_pekerjaan' => 'Aplikasi Pembukuan PT Jaya Sukses',
                'pelanggan' => 'PT Jaya Sukses',
                'jenis_layanan' => 'Produk',
                'nominal_harga' => 25000000,
                'deskripsi_pekerjaan' => 'Aplikasi Pembukuan PT Jaya Sukses adalah aplikasi berbasis web dan aplikasi berbasis mobile yang dapat mencetak pembukuan dari penjualan setiap bulannya dan dapat melihat rekap penjualan pertahun.',
                'target_waktu_selesai' => '2024-01-05',
                'persentase_selesai' => 100,
                'waktu_selesai' => '2024-01-05',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_status_pekerjaan' => 1,
                'id_kategori_pekerjaan' => 2,
                'nama_pekerjaan' => 'Aplikasi Absensi SMAN 1 Bandar',
                'pelanggan' => 'SMAN 1 Bandar',
                'jenis_layanan' => 'Produk',
                'nominal_harga' => 30000000,
                'deskripsi_pekerjaan' => 'Aplikasi Absensin SMAN 1 Bandar terdiri atas aplikasi web sebagai monitoring admin yang dapat menggenerate qr-absen, selanjutnya aplikasi berbasis android yang digunakan siswa dan pegawai untuk melakukan scan untuk absensi',
                'target_waktu_selesai' => '2024-06-02',
                'persentase_selesai' => 45,
                'waktu_selesai' => null,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_status_pekerjaan' => 5,
                'id_kategori_pekerjaan' => 3,
                'nama_pekerjaan' => 'Web Profile Dinkes Kota Semarang',
                'pelanggan' => 'Dinas Kesehatan Kota Semarang',
                'jenis_layanan' => 'Produk',
                'nominal_harga' => 10000000,
                'deskripsi_pekerjaan' => 'Web Profile Dinas Kesehatan Kota Semarang menyediakan informasi publik dan publikasi aktifitas yang ada dalam lingkup kerja dinas kesehatan kota Semarang.',
                'target_waktu_selesai' => '2024-05-25',
                'persentase_selesai' => 27,
                'waktu_selesai' => null,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_status_pekerjaan' => 1,
                'id_kategori_pekerjaan' => 1,
                'nama_pekerjaan' => 'Website Recruitement Pegawai PT Agung Jaya Mineral',
                'pelanggan' => 'PT Agung Jaya Mineral',
                'jenis_layanan' => 'Produk',
                'nominal_harga' => 112000000,
                'deskripsi_pekerjaan' => 'Website Recruitement Pegawai diharapkan dapat digunakan dalam melakukan recruitment pegawai baru, selain itu website ini digunakan sebagai wadah ujian dalam melakukan rekrutment.',
                'target_waktu_selesai' => '2023-07-30',
                'persentase_selesai' => 72,
                'waktu_selesai' => null,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ]
        ];
        $this->db->table('pekerjaan')->insertBatch($data);
    }
}
