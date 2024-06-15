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
//tes demo
            //pekerjaan 7
            // [
            //     'id_personil' => 81,
            //     'id_pekerjaan' => 7,
            //     'id_user' => 5,
            //     'role_personil' => 'project_manager',
            //     'created_at'       => Time::now(),
            //     'updated_at'       => Time::now()
            // ],
            // [
            //     'id_personil' => 82,
            //     'id_pekerjaan' => 7,
            //     'id_user' => 5,
            //     'role_personil' => 'desainer',
            //     'created_at'       => Time::now(),
            //     'updated_at'       => Time::now()
            // ],
            // [
            //     'id_personil' => 83,
            //     'id_pekerjaan' => 7,
            //     'id_user' => 6,
            //     'role_personil' => 'desainer',
            //     'created_at'       => Time::now(),
            //     'updated_at'       => Time::now()
            // ],
            [
                'id_personil' => 84,
                'id_pekerjaan' => 7,
                'id_user' => 5,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 85,
                'id_pekerjaan' => 7,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 86,
                'id_pekerjaan' => 7,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 87,
                'id_pekerjaan' => 7,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 88,
                'id_pekerjaan' => 7,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 89,
                'id_pekerjaan' => 7,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 90,
                'id_pekerjaan' => 7,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 91,
                'id_pekerjaan' => 7,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 92,
                'id_pekerjaan' => 7,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 93,
                'id_pekerjaan' => 7,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],


            
            //pekerjaan 8
            [
                'id_personil' => 94,
                'id_pekerjaan' => 8,
                'id_user' => 5,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 95,
                'id_pekerjaan' => 8,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 96,
                'id_pekerjaan' => 8,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 97,
                'id_pekerjaan' => 8,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 98,
                'id_pekerjaan' => 8,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 99,
                'id_pekerjaan' => 8,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 100,
                'id_pekerjaan' => 8,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 101,
                'id_pekerjaan' => 8,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 102,
                'id_pekerjaan' => 8,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 103,
                'id_pekerjaan' => 8,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 104,
                'id_pekerjaan' => 8,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 105,
                'id_pekerjaan' => 8,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 106,
                'id_pekerjaan' => 8,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 9
            [
                'id_personil' => 107,
                'id_pekerjaan' => 9,
                'id_user' => 5,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 108,
                'id_pekerjaan' => 9,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 109,
                'id_pekerjaan' => 9,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 110,
                'id_pekerjaan' => 9,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 111,
                'id_pekerjaan' => 9,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 112,
                'id_pekerjaan' => 9,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 113,
                'id_pekerjaan' => 9,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 114,
                'id_pekerjaan' => 9,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 115,
                'id_pekerjaan' => 9,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 116,
                'id_pekerjaan' => 9,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 117,
                'id_pekerjaan' => 9,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 118,
                'id_pekerjaan' => 9,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 119,
                'id_pekerjaan' => 9,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 10
            [
                'id_personil' => 120,
                'id_pekerjaan' => 10,
                'id_user' => 5,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 121,
                'id_pekerjaan' => 10,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 122,
                'id_pekerjaan' => 10,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 123,
                'id_pekerjaan' => 10,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 124,
                'id_pekerjaan' => 10,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 125,
                'id_pekerjaan' => 10,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 126,
                'id_pekerjaan' => 10,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 127,
                'id_pekerjaan' => 10,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 128,
                'id_pekerjaan' => 10,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 129,
                'id_pekerjaan' => 10,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 130,
                'id_pekerjaan' => 10,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 131,
                'id_pekerjaan' => 10,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 132,
                'id_pekerjaan' => 10,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 11
            [
                'id_personil' => 133,
                'id_pekerjaan' => 11,
                'id_user' => 6,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 134,
                'id_pekerjaan' => 11,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 135,
                'id_pekerjaan' => 11,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 136,
                'id_pekerjaan' => 11,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 137,
                'id_pekerjaan' => 11,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 138,
                'id_pekerjaan' => 11,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 139,
                'id_pekerjaan' => 11,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 140,
                'id_pekerjaan' => 11,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 141,
                'id_pekerjaan' => 11,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 142,
                'id_pekerjaan' => 11,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 143,
                'id_pekerjaan' => 11,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 144,
                'id_pekerjaan' => 11,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 145,
                'id_pekerjaan' => 11,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjan 12
            [
                'id_personil' => 146,
                'id_pekerjaan' => 12,
                'id_user' => 33,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 147,
                'id_pekerjaan' => 12,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 148,
                'id_pekerjaan' => 12,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 149,
                'id_pekerjaan' => 12,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 150,
                'id_pekerjaan' => 12,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 151,
                'id_pekerjaan' => 12,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 152,
                'id_pekerjaan' => 12,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 153,
                'id_pekerjaan' => 12,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 154,
                'id_pekerjaan' => 12,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 155,
                'id_pekerjaan' => 12,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 156,
                'id_pekerjaan' => 12,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 157,
                'id_pekerjaan' => 12,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 158,
                'id_pekerjaan' => 12,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 13
            [
                'id_personil' => 159,
                'id_pekerjaan' => 13,
                'id_user' => 6,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 160,
                'id_pekerjaan' => 13,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 161,
                'id_pekerjaan' => 13,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 162,
                'id_pekerjaan' => 13,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 163,
                'id_pekerjaan' => 13,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 164,
                'id_pekerjaan' => 13,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 165,
                'id_pekerjaan' => 13,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 166,
                'id_pekerjaan' => 13,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 167,
                'id_pekerjaan' => 13,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 168,
                'id_pekerjaan' => 13,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 169,
                'id_pekerjaan' => 13,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 170,
                'id_pekerjaan' => 13,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 171,
                'id_pekerjaan' => 13,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 14
            [
                'id_personil' => 172,
                'id_pekerjaan' => 14,
                'id_user' => 5,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 173,
                'id_pekerjaan' => 14,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 174,
                'id_pekerjaan' => 14,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 175,
                'id_pekerjaan' => 14,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 176,
                'id_pekerjaan' => 14,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 177,
                'id_pekerjaan' => 14,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 178,
                'id_pekerjaan' => 14,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 179,
                'id_pekerjaan' => 14,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 180,
                'id_pekerjaan' => 14,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 181,
                'id_pekerjaan' => 14,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 182,
                'id_pekerjaan' => 14,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 183,
                'id_pekerjaan' => 14,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 184,
                'id_pekerjaan' => 14,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 15
            [
                'id_personil' => 185,
                'id_pekerjaan' => 15,
                'id_user' => 6,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 186,
                'id_pekerjaan' => 15,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 187,
                'id_pekerjaan' => 15,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 188,
                'id_pekerjaan' => 15,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 189,
                'id_pekerjaan' => 15,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 190,
                'id_pekerjaan' => 15,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 191,
                'id_pekerjaan' => 15,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 192,
                'id_pekerjaan' => 15,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 193,
                'id_pekerjaan' => 15,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 194,
                'id_pekerjaan' => 15,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 195,
                'id_pekerjaan' => 15,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 196,
                'id_pekerjaan' => 15,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 197,
                'id_pekerjaan' => 15,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 16
            [
                'id_personil' => 198,
                'id_pekerjaan' => 16,
                'id_user' => 5,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 199,
                'id_pekerjaan' => 16,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 200,
                'id_pekerjaan' => 16,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 201,
                'id_pekerjaan' => 16,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 202,
                'id_pekerjaan' => 16,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 203,
                'id_pekerjaan' => 16,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 204,
                'id_pekerjaan' => 16,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 205,
                'id_pekerjaan' => 16,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 206,
                'id_pekerjaan' => 16,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 207,
                'id_pekerjaan' => 16,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 208,
                'id_pekerjaan' => 16,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 209,
                'id_pekerjaan' => 16,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 210,
                'id_pekerjaan' => 16,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 17
            [
                'id_personil' => 211,
                'id_pekerjaan' => 17,
                'id_user' => 6,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 212,
                'id_pekerjaan' => 17,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 213,
                'id_pekerjaan' => 17,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 214,
                'id_pekerjaan' => 17,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 215,
                'id_pekerjaan' => 17,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 216,
                'id_pekerjaan' => 17,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 217,
                'id_pekerjaan' => 17,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 218,
                'id_pekerjaan' => 17,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 219,
                'id_pekerjaan' => 17,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 220,
                'id_pekerjaan' => 17,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 221,
                'id_pekerjaan' => 17,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 222,
                'id_pekerjaan' => 17,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 223,
                'id_pekerjaan' => 17,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 18
            [
                'id_personil' => 224,
                'id_pekerjaan' => 18,
                'id_user' => 33,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 225,
                'id_pekerjaan' => 18,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 226,
                'id_pekerjaan' => 18,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 227,
                'id_pekerjaan' => 18,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 228,
                'id_pekerjaan' => 18,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 229,
                'id_pekerjaan' => 18,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 230,
                'id_pekerjaan' => 18,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 231,
                'id_pekerjaan' => 18,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 232,
                'id_pekerjaan' => 18,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 233,
                'id_pekerjaan' => 18,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 234,
                'id_pekerjaan' => 18,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 235,
                'id_pekerjaan' => 18,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 236,
                'id_pekerjaan' => 18,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 19
            [
                'id_personil' => 237,
                'id_pekerjaan' => 18,
                'id_user' => 33,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 238,
                'id_pekerjaan' => 18,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 239,
                'id_pekerjaan' => 18,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 240,
                'id_pekerjaan' => 18,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 241,
                'id_pekerjaan' => 18,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 242,
                'id_pekerjaan' => 18,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 243,
                'id_pekerjaan' => 18,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 244,
                'id_pekerjaan' => 18,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 245,
                'id_pekerjaan' => 18,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 246,
                'id_pekerjaan' => 18,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 247,
                'id_pekerjaan' => 18,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 248,
                'id_pekerjaan' => 18,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 249,
                'id_pekerjaan' => 18,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 19
            [
                'id_personil' => 250,
                'id_pekerjaan' => 19,
                'id_user' => 33,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 251,
                'id_pekerjaan' => 19,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 252,
                'id_pekerjaan' => 19,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 253,
                'id_pekerjaan' => 19,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 254,
                'id_pekerjaan' => 19,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 255,
                'id_pekerjaan' => 19,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 256,
                'id_pekerjaan' => 19,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 257,
                'id_pekerjaan' => 19,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 258,
                'id_pekerjaan' => 19,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 259,
                'id_pekerjaan' => 19,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 260,
                'id_pekerjaan' => 19,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 261,
                'id_pekerjaan' => 19,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 262,
                'id_pekerjaan' => 19,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 20
            [
                'id_personil' => 263,
                'id_pekerjaan' => 20,
                'id_user' => 33,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 264,
                'id_pekerjaan' => 20,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 265,
                'id_pekerjaan' => 20,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 266,
                'id_pekerjaan' => 20,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 267,
                'id_pekerjaan' => 20,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 268,
                'id_pekerjaan' => 20,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 269,
                'id_pekerjaan' => 20,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 270,
                'id_pekerjaan' => 20,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 271,
                'id_pekerjaan' => 20,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 272,
                'id_pekerjaan' => 20,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 273,
                'id_pekerjaan' => 20,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 274,
                'id_pekerjaan' => 20,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 275,
                'id_pekerjaan' => 20,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 21
            [
                'id_personil' => 276,
                'id_pekerjaan' => 21,
                'id_user' => 5,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 277,
                'id_pekerjaan' => 21,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 278,
                'id_pekerjaan' => 21,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 279,
                'id_pekerjaan' => 21,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 280,
                'id_pekerjaan' => 21,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 281,
                'id_pekerjaan' => 21,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 282,
                'id_pekerjaan' => 21,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 283,
                'id_pekerjaan' => 21,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 284,
                'id_pekerjaan' => 21,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 285,
                'id_pekerjaan' => 21,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 286,
                'id_pekerjaan' => 21,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 287,
                'id_pekerjaan' => 21,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 288,
                'id_pekerjaan' => 21,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 22
            [
                'id_personil' => 289,
                'id_pekerjaan' => 22,
                'id_user' => 33,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 290,
                'id_pekerjaan' => 22,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 291,
                'id_pekerjaan' => 22,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 292,
                'id_pekerjaan' => 22,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 293,
                'id_pekerjaan' => 22,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 294,
                'id_pekerjaan' => 22,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 295,
                'id_pekerjaan' => 22,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 296,
                'id_pekerjaan' => 22,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 297,
                'id_pekerjaan' => 22,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 298,
                'id_pekerjaan' => 22,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 299,
                'id_pekerjaan' => 22,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 300,
                'id_pekerjaan' => 22,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 301,
                'id_pekerjaan' => 22,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 23
            [
                'id_personil' => 302,
                'id_pekerjaan' => 23,
                'id_user' => 33,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 303,
                'id_pekerjaan' => 23,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 304,
                'id_pekerjaan' => 23,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 305,
                'id_pekerjaan' => 23,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 306,
                'id_pekerjaan' => 23,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 307,
                'id_pekerjaan' => 23,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 308,
                'id_pekerjaan' => 23,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 309,
                'id_pekerjaan' => 23,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 310,
                'id_pekerjaan' => 23,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 311,
                'id_pekerjaan' => 23,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 312,
                'id_pekerjaan' => 23,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 313,
                'id_pekerjaan' => 23,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 314,
                'id_pekerjaan' => 23,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],

            //pekerjaan 24
            [
                'id_personil' => 315,
                'id_pekerjaan' => 24,
                'id_user' => 33,
                'role_personil' => 'project_manager',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 316,
                'id_pekerjaan' => 24,
                'id_user' => 5,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 317,
                'id_pekerjaan' => 24,
                'id_user' => 6,
                'role_personil' => 'desainer',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 318,
                'id_pekerjaan' => 24,
                'id_user' => 10,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 319,
                'id_pekerjaan' => 24,
                'id_user' => 11,
                'role_personil' => 'backend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 320,
                'id_pekerjaan' => 24,
                'id_user' => 12,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 321,
                'id_pekerjaan' => 24,
                'id_user' => 14,
                'role_personil' => 'frontend_web',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 322,
                'id_pekerjaan' => 24,
                'id_user' => 16,
                'role_personil' => 'backend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 323,
                'id_pekerjaan' => 24,
                'id_user' => 19,
                'role_personil' => 'frontend_mobile',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 324,
                'id_pekerjaan' => 24,
                'id_user' => 23,
                'role_personil' => 'tester',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 325,
                'id_pekerjaan' => 24,
                'id_user' => 27,
                'role_personil' => 'admin',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 326,
                'id_pekerjaan' => 24,
                'id_user' => 32,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
            [
                'id_personil' => 327,
                'id_pekerjaan' => 24,
                'id_user' => 33,
                'role_personil' => 'helpdesk',
                'created_at'       => Time::now(),
                'updated_at'       => Time::now()
            ],
        ];
        $this->db->table('personil')->insertBatch($data);
    }
}