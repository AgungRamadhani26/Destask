<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CallSeeder extends Seeder
{
    public function run()
    {
        $this->call('KategoriPekerjaanSeeder');
        $this->call('StatusPekerjaanSeeder');
        $this->call('StatusTaskSeeder');
        $this->call('KategoriTaskSeeder');
        $this->call('UserGroupSeeder');
        $this->call('HariLiburSeeder');
        $this->call('TargetPoinHarianSeeder');
        $this->call('BobotKategoriTaskSeeder');
        $this->call('UserSeeder');
        $this->call('PekerjaanSeeder');
        $this->call('PersonilSeeder');
    }
}
