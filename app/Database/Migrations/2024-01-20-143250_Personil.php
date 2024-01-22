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
            'id_user_pm' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'desainer1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true
            ],
            'desainer2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true
            ],
            'be_web1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true
            ],
            'be_web2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true
            ],
            'be_web3' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true
            ],
            'be_mobile1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true
            ],
            'be_mobile2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true
            ],
            'be_mobile3' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true
            ],
            'fe_web1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true
            ],
            'fe_mobile1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
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
        $this->forge->addForeignKey('id_user_pm', 'user', 'id_user');
        $this->forge->createTable('personil');
    }

    public function down()
    {
        $this->forge->dropTable('personil');
    }
}
