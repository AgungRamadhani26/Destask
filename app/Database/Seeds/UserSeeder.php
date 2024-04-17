<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_usergroup'     => 1,
                'username'         => 'rijal',
                'email'            => 'rijal@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Rijal',
                'foto_profil'      => 'user.png',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 1,
                'username'         => 'kurniawan',
                'email'            => 'kurniawan@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'kurniawan',
                'foto_profil'      => 'user.png',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 1,
                'username'         => 'agung2611',
                'email'            => 'agungramadhani2611@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'admin',
                'nama'             => 'Agung Ramadhani',
                'foto_profil'      => 'agung.jpg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => null,
                'username'         => 'ninda666',
                'email'            => 'ninda@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'direksi',
                'nama'             => 'Amanda Ninda Amalia',
                'foto_profil'      => 'ninda.jpg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => null,
                'username'         => 'daffa_ganteng',
                'email'            => 'daffa@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'hod',
                'nama'             => 'Daffa Sinaga',
                'foto_profil'      => 'dafa.jpg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 1,
                'username'         => 'bimbims',
                'email'            => 'bimasatria@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Bima Satria',
                'foto_profil'      => 'bima.jpg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 1,
                'username'         => 'agussnya1',
                'email'            => 'agussnya1@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Agus Adi Kurnia',
                'foto_profil'      => 'agus.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 1,
                'username'         => 'alexasenyum12',
                'email'            => 'broncolex@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Alexandria Bronco Saraswati',
                'foto_profil'      => 'alexabronco.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 1,
                'username'         => 'dinaazzz',
                'email'            => 'dinahmad@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Dina Zulfina Ahmad',
                'foto_profil'      => 'Dina.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 1,
                'username'         => 'lellly',
                'email'            => 'lely@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Lelly Khusumawardhani',
                'foto_profil'      => 'lely.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 1,
                'username'         => 'zamhiruddin',
                'email'            => 'zamhiruddinalamsyah@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Zamhiruddin Alamsyah',
                'foto_profil'      => 'zamhir.jpg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 2,
                'username'         => 'jatmiko12',
                'email'            => 'jatmiko@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Jatmiko Adi Nugroho',
                'foto_profil'      => 'jatmiko.jpg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 2,
                'username'         => 'amranxiacic',
                'email'            => 'amran@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Hidayat Nur Amran',
                'foto_profil'      => 'amran.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 2,
                'username'         => 'amsari69',
                'email'            => 'amsarikurniadi@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Amsari Kurniadi',
                'foto_profil'      => 'amsari.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 2,
                'username'         => 'haryati2002',
                'email'            => 'haryati2002@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Haryati Dian Pertiwi',
                'foto_profil'      => 'haryati.jpg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 2,
                'username'         => 'lodpau',
                'email'            => 'wick2lod@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Lodwick Paulus Situmeang',
                'foto_profil'      => 'lodwick.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 2,
                'username'         => 'cipto26',
                'email'            => 'cipto26@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Sucipto Hasanuddin Alim',
                'foto_profil'      => 'sucipto.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 3,
                'username'         => 'fira2020',
                'email'            => 'putrimayang@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Putri Mayang Syafira',
                'foto_profil'      => 'fira.jpg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 3,
                'username'         => 'atriana',
                'email'            => 'herlitaatrianan@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Atriana Herlita Salim',
                'foto_profil'      => 'atriana.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 3,
                'username'         => 'devdev',
                'email'            => 'devy@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Devy Putri Arhani',
                'foto_profil'      => 'Devy.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 3,
                'username'         => 'hidayat11',
                'email'            => 'hidayat@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Nur Amri Hidayatullah',
                'foto_profil'      => 'hidayat.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 3,
                'username'         => 'luqmanhkm',
                'email'            => 'luqmanhkm@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Luqman Hakim',
                'foto_profil'      => 'luqman.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 3,
                'username'         => 'marco',
                'email'            => 'marcophp22@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Marco Xaferius',
                'foto_profil'      => 'marco.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 4,
                'username'         => 'diego',
                'email'            => 'diegoggs@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Diego Adhi Fernando',
                'foto_profil'      => 'tester_diego.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 4,
                'username'         => 'hamidah',
                'email'            => 'hamidah@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Hamidah Amalia',
                'foto_profil'      => 'tester_hamidah.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 4,
                'username'         => 'irawan',
                'email'            => 'irawan@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Bisma Irawan',
                'foto_profil'      => 'tester_irawan.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 4,
                'username'         => 'marwati',
                'email'            => 'marwati@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Warwati Ardina',
                'foto_profil'      => 'tester_marwati.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 4,
                'username'         => 'Putra',
                'email'            => 'putput@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Putra Hardika Sinaga',
                'foto_profil'      => 'tester_putra.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 5,
                'username'         => 'agatha12',
                'email'            => 'agatha12@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Agatha Maryani',
                'foto_profil'      => 'admin_agatha.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 5,
                'username'         => 'arifrahman',
                'email'            => 'arifrahman@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Arif Rahman',
                'foto_profil'      => 'admin_arifrahman.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 5,
                'username'         => 'boyke',
                'email'            => 'boyke@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Boyke Raden Ananda',
                'foto_profil'      => 'admin_boyke.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 5,
                'username'         => 'fatin',
                'email'            => 'fatin@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Fatin Triamanda',
                'foto_profil'      => 'admin_fatin.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 5,
                'username'         => 'ulfah',
                'email'            => 'ulfah@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Ulfah Zidni Hakim',
                'foto_profil'      => 'admin_ulfah.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 6,
                'username'         => 'farah',
                'email'            => 'farah@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Farah Amanda',
                'foto_profil'      => 'helpdesk_farah.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 6,
                'username'         => 'irma',
                'email'            => 'irma@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'supervisi',
                'nama'             => 'Irma Yanti',
                'foto_profil'      => 'helpdesk_irma.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 6,
                'username'         => 'pierro',
                'email'            => 'pierro@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Jose Pierro',
                'foto_profil'      => 'helpdesk_pierro.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 6,
                'username'         => 'titan',
                'email'            => 'titan@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Titan Wardoyo',
                'foto_profil'      => 'helpdesk_titan.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_usergroup'     => 6,
                'username'         => 'veronica',
                'email'            => 'veronica@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'staff',
                'nama'             => 'Lina Veronica Atmaja',
                'foto_profil'      => 'helpdesk_vero.jpeg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
        ];
        $this->db->table('user')->insertBatch($data);
    }
}