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
                'id_usergroup'     => null,
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
                'user_level'       => 'staff',
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
                'foto_profil'      => 'zamhir.jpeg',
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
                'user_level'       => 'staff',
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
                'user_level'       => 'staff',
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
            ]
        ];
        $this->db->table('user')->insertBatch($data);
    }
}
