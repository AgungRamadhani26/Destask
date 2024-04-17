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
                'id_user' => 4,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 13,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 17,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 18,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 22,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 28,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 1,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            [
                'id_pekerjaan' => 2,
                'id_user' => 12,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 4,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 13,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 14,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 15,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 13,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 17,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 20,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 21,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 17,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 24,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 29,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 2,
                'id_user' => 34,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            [
                'id_pekerjaan' => 3,
                'id_user' => 6,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 3,
                'id_user' => 4,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 3,
                'id_user' => 14,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 3,
                'id_user' => 13,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 3,
                'id_user' => 11,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 3,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 3,
                'id_user' => 25,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 3,
                'id_user' => 30,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 3,
                'id_user' => 35,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            [
                'id_pekerjaan' => 4,
                'id_user' => 10,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 7,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 8,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 9,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 12,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 13,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 15,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 26,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 31,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 4,
                'id_user' => 36,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            [
                'id_pekerjaan' => 5,
                'id_user' => 12,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 8,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 13,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 14,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 15,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 13,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 17,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 21,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 24,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 29,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 5,
                'id_user' => 34,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            [
                'id_pekerjaan' => 6,
                'id_user' => 33,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_pekerjaan' => 6,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
        ];
        $this->db->table('personil')->insertBatch($data);
    }
}