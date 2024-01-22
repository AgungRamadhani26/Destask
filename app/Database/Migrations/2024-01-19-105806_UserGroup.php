<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserGroup extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_usergroup' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_usergroup' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true
            ],
            'deskripsi_usergroup' => [
                'type'       => 'TEXT',
                'null'  => true,
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
        $this->forge->addKey('id_usergroup', true);
        $this->forge->createTable('usergroup');
    }

    public function down()
    {
        $this->forge->dropTable('usergroup');
    }
}
