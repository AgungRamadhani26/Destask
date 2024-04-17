<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class PersonilSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_personil' => 1,
                'id_user' => 1,
                'id_pekerjaan' => 1,
                'role_personil' => 'Project Manager',
            ],
            
        ];
        $this->db->table('personil')->insertBatch($data);
    }
}