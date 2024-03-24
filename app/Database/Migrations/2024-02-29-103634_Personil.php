<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Personil extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_personil' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_pekerjaan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'role_personil' => [
                'type'       => 'ENUM',
                'constraint' => ['project_manager', 'desainer', 'backend_web', 'frontend_web', 'backend_mobile', 'frontend_mobile', 'tester', 'admin', 'helpdesk'],
                'null'       => true
            ],
            'created_at' => [
                'type'  => 'DATETIME',
                'null'  => true,
            ],
            'updated_at' => [
                'type'  => 'DATETIME',
                'null'  => true,
            ],
            'deleted_at' => [
                'type'  => 'DATETIME',
                'null'  => true,
            ]
        ]);
        $this->forge->addKey('id_personil', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->addForeignKey('id_pekerjaan', 'pekerjaan', 'id_pekerjaan');
        $this->forge->createTable('personil');
    }

    public function down()
    {
        $this->forge->dropTable('personil');
    }
}
