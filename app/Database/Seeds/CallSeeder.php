<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CallSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserGroupSeeder');
        $this->call('UserSeeder');
        $this->call('StatusPekerjaanSeeder');
        $this->call('KategoriPekerjaanSeeder');
        $this->call('StatusTaskSeeder');
        $this->call('KategoriTaskSeeder');
        $this->call('BobotKategoriTaskSeeder');
        $this->call('PekerjaanSeeder');
        $this->call('PersonilSeeder');
    }
}