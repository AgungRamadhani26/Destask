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
                'id_status_pekerjaan' => 3,
                'id_kategori_pekerjaan' => 2,
                'nama_pekerjaan' => 'Aplikasi Pembukuan PT Jaya Sukses',
                'pelanggan' => 'PT Jaya Sukses',
                'jenis_pelanggan' => 'swasta',
                'nama_pic' => 'Bayu Eko Setiawan',
                'email_pic' => 'bayueko@gmail.com',
                'nowa_pic' => '087827655788',
                'jenis_layanan' => 'produk',
                'nominal_harga' => 25000000,
                'deskripsi_pekerjaan' => 'Aplikasi Pembukuan PT Jaya Sukses adalah aplikasi berbasis web dan aplikasi berbasis mobile yang dapat mencetak pembukuan dari penjualan setiap bulannya dan dapat melihat rekap penjualan pertahun.',
                'target_waktu_selesai' => '2024-01-05',
                'persentase_selesai' => 100,
                'waktu_selesai' => '2024-01-05',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_status_pekerjaan' => 2,
                'id_kategori_pekerjaan' => 2,
                'nama_pekerjaan' => 'Aplikasi Absensi SMAN 1 Bandar',
                'pelanggan' => 'SMAN 1 Bandar',
                'jenis_pelanggan' => 'negeri',
                'nama_pic' => 'Maryani Samosir',
                'email_pic' => 'samosirmaryani@gmail.com',
                'nowa_pic' => '087830066802',
                'jenis_layanan' => 'produk',
                'nominal_harga' => 30000000,
                'deskripsi_pekerjaan' => 'Aplikasi Absensin SMAN 1 Bandar terdiri atas aplikasi web sebagai monitoring admin yang dapat menggenerate qr-absen, selanjutnya aplikasi berbasis android yang digunakan siswa dan pegawai untuk melakukan scan untuk absensi',
                'target_waktu_selesai' => '2024-06-14',
                'persentase_selesai' => 45,
                'waktu_selesai' => null,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_status_pekerjaan' => 1,
                'id_kategori_pekerjaan' => 3,
                'nama_pekerjaan' => 'Web Profile Dinkes Kota Semarang',
                'pelanggan' => 'Dinas Kesehatan Kota Semarang',
                'jenis_pelanggan' => 'negeri',
                'nama_pic' => 'Hamid Nur Akbar',
                'email_pic' => 'hamidnurakbar12@gmail.com',
                'nowa_pic' => '082370708349',
                'jenis_layanan' => 'produk',
                'nominal_harga' => 10000000,
                'deskripsi_pekerjaan' => 'Web Profile Dinas Kesehatan Kota Semarang menyediakan informasi publik dan publikasi aktifitas yang ada dalam lingkup kerja dinas kesehatan kota Semarang.',
                'target_waktu_selesai' => '2024-05-24',
                'persentase_selesai' => 0,
                'waktu_selesai' => null,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_status_pekerjaan' => 2,
                'id_kategori_pekerjaan' => 1,
                'nama_pekerjaan' => 'Website Recruitement Pegawai PT Agung Jaya Mineral',
                'pelanggan' => 'PT Agung Jaya Mineral',
                'jenis_pelanggan' => 'swasta',
                'nama_pic' => 'Ali Alexander Widada',
                'email_pic' => 'widada12alex12@gmail.com',
                'nowa_pic' => '082122255122',
                'jenis_layanan' => 'produk',
                'nominal_harga' => 112000000,
                'deskripsi_pekerjaan' => 'Website Recruitement Pegawai diharapkan dapat digunakan dalam melakukan recruitment pegawai baru, selain itu website ini digunakan sebagai wadah ujian dalam melakukan rekrutment.',
                'target_waktu_selesai' => '2023-07-31',
                'persentase_selesai' => 72,
                'waktu_selesai' => null,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_status_pekerjaan' => 4,
                'id_kategori_pekerjaan' => 1,
                'nama_pekerjaan' => 'Sistem Informasi Monitoring Kompetensi Guru',
                'pelanggan' => 'Dinas Pendidikan Kota Semarang',
                'jenis_pelanggan' => 'negeri',
                'nama_pic' => 'Dina Fahira Amar',
                'email_pic' => 'dina@gmail.com',
                'nowa_pic' => '083822523168',
                'jenis_layanan' => 'boutique',
                'nominal_harga' => 113000000,
                'deskripsi_pekerjaan' => 'Sistem informasi monitoring kompetensi guru diharapkan dapat bermanfaat sebagai pantauan kompetensi guru yang mengajar di setap sekolah di kota Semarang.',
                'target_waktu_selesai' => '2023-07-31',
                'persentase_selesai' => 60,
                'waktu_selesai' => null,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_status_pekerjaan' => 5,
                'id_kategori_pekerjaan' => 2,
                'nama_pekerjaan' => 'Sistem Informasi Aset Kantor PT Kunia Lestari',
                'pelanggan' => 'PT Kunia Lestari',
                'jenis_pelanggan' => 'swasta',
                'nama_pic' => 'Sufmi Hamdan',
                'email_pic' => 'sufni1345arck@gmail.com',
                'nowa_pic' => '087715752029',
                'jenis_layanan' => 'boutique',
                'nominal_harga' => 100000000,
                'deskripsi_pekerjaan' => 'Sistem informasi diharapkan dapat mendata setiap alat yang ada di PT Kurnia lestari, serta dapat mencatat data data pengadaan barang.',
                'target_waktu_selesai' => '2023-07-29',
                'persentase_selesai' => 0,
                'waktu_selesai' => null,
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ]
        ];
        $this->db->table('pekerjaan')->insertBatch($data);
    }
}
