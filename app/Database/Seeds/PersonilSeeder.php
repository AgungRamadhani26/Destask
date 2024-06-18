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
                'id_pekerjaan' => 1,
                'id_user' => 4,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 2,
                'id_pekerjaan' => 1,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 3,
                'id_pekerjaan' => 1,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 4,
                'id_pekerjaan' => 1,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 5,
                'id_pekerjaan' => 1,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 6,
                'id_pekerjaan' => 1,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 7,
                'id_pekerjaan' => 1,
                'id_user' => 13,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 8,
                'id_pekerjaan' => 1,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 9,
                'id_pekerjaan' => 1,
                'id_user' => 17,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 10,
                'id_pekerjaan' => 1,
                'id_user' => 18,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 11,
                'id_pekerjaan' => 1,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 12,
                'id_pekerjaan' => 1,
                'id_user' => 22,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 13,
                'id_pekerjaan' => 1,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 14,
                'id_pekerjaan' => 1,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 15,
                'id_pekerjaan' => 1,
                'id_user' => 28,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 16,
                'id_pekerjaan' => 1,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 17,
                'id_pekerjaan' => 1,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            [
                'id_personil' => 18,
                'id_pekerjaan' => 2,
                'id_user' => 12,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 19,
                'id_pekerjaan' => 2,
                'id_user' => 4,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 20,
                'id_pekerjaan' => 2,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 21,
                'id_pekerjaan' => 2,
                'id_user' => 13,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 22,
                'id_pekerjaan' => 2,
                'id_user' => 14,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 23,
                'id_pekerjaan' => 2,
                'id_user' => 15,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 24,
                'id_pekerjaan' => 2,
                'id_user' => 13,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 25,
                'id_pekerjaan' => 2,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 26,
                'id_pekerjaan' => 2,
                'id_user' => 17,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 27,
                'id_pekerjaan' => 2,
                'id_user' => 20,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 28,
                'id_pekerjaan' => 2,
                'id_user' => 21,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 29,
                'id_pekerjaan' => 2,
                'id_user' => 17,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 30,
                'id_pekerjaan' => 2,
                'id_user' => 24,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 31,
                'id_pekerjaan' => 2,
                'id_user' => 29,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 32,
                'id_pekerjaan' => 2,
                'id_user' => 34,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            [
                'id_personil' => 33,
                'id_pekerjaan' => 3,
                'id_user' => 6,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 34,
                'id_pekerjaan' => 3,
                'id_user' => 4,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 35,
                'id_pekerjaan' => 3,
                'id_user' => 14,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 36,
                'id_pekerjaan' => 3,
                'id_user' => 13,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 37,
                'id_pekerjaan' => 3,
                'id_user' => 11,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 38,
                'id_pekerjaan' => 3,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 39,
                'id_pekerjaan' => 3,
                'id_user' => 25,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 40,
                'id_pekerjaan' => 3,
                'id_user' => 30,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 41,
                'id_pekerjaan' => 3,
                'id_user' => 35,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            [
                'id_personil' => 42,
                'id_pekerjaan' => 4,
                'id_user' => 10,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 43,
                'id_pekerjaan' => 4,
                'id_user' => 7,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 44,
                'id_pekerjaan' => 4,
                'id_user' => 8,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 45,
                'id_pekerjaan' => 4,
                'id_user' => 9,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 46,
                'id_pekerjaan' => 4,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 47,
                'id_pekerjaan' => 4,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 48,
                'id_pekerjaan' => 4,
                'id_user' => 12,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 49,
                'id_pekerjaan' => 4,
                'id_user' => 13,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 50,
                'id_pekerjaan' => 4,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 51,
                'id_pekerjaan' => 4,
                'id_user' => 15,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 52,
                'id_pekerjaan' => 4,
                'id_user' => 26,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 53,
                'id_pekerjaan' => 4,
                'id_user' => 31,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 54,
                'id_pekerjaan' => 4,
                'id_user' => 34,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            [
                'id_personil' => 55,
                'id_pekerjaan' => 5,
                'id_user' => 12,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 56,
                'id_pekerjaan' => 5,
                'id_user' => 8,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 57,
                'id_pekerjaan' => 5,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 58,
                'id_pekerjaan' => 5,
                'id_user' => 13,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 59,
                'id_pekerjaan' => 5,
                'id_user' => 14,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 60,
                'id_pekerjaan' => 5,
                'id_user' => 15,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 61,
                'id_pekerjaan' => 5,
                'id_user' => 13,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 62,
                'id_pekerjaan' => 5,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 63,
                'id_pekerjaan' => 5,
                'id_user' => 17,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 64,
                'id_pekerjaan' => 5,
                'id_user' => 21,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 65,
                'id_pekerjaan' => 5,
                'id_user' => 24,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 66,
                'id_pekerjaan' => 5,
                'id_user' => 29,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 67,
                'id_pekerjaan' => 5,
                'id_user' => 34,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            [
                'id_personil' => 68,
                'id_pekerjaan' => 6,
                'id_user' => 33,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 69,
                'id_pekerjaan' => 6,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 70,
                'id_pekerjaan' => 6,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 71,
                'id_pekerjaan' => 6,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 72,
                'id_pekerjaan' => 6,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 73,
                'id_pekerjaan' => 6,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 74,
                'id_pekerjaan' => 6,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 75,
                'id_pekerjaan' => 6,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 76,
                'id_pekerjaan' => 6,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 77,
                'id_pekerjaan' => 6,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 78,
                'id_pekerjaan' => 6,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 79,
                'id_pekerjaan' => 6,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 80,
                'id_pekerjaan' => 6,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 81,
                'id_pekerjaan' => 7,
                'id_user' => 4,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 82,
                'id_pekerjaan' => 8,
                'id_user' => 12,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 83,
                'id_pekerjaan' => 9,
                'id_user' => 27,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
        ];
        $this->db->table('personil')->insertBatch($data);
    }
}
