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
                'id_usergroup'     => 2,
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
                'id_usergroup'     => 1,
                'username'         => 'daffa_ganteng',
                'email'            => 'daffa@gmail.com',
                'password'         => md5('123456'),
                'user_level'       => 'hod',
                'nama'             => 'Daffa Sinaga',
                'foto_profil'      => 'dafa.jpg',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

        ];
        $this->db->table('user')->insertBatch($data);
    }
}