<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notifikasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_notifikasi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_task' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_pekerjaan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'judul_notifikasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true
            ],
            'pesan_notifikasi' => [
                'type'       => 'TEXT',
                'null'  => true,
            ],
            'status_terbaca' => [
                'type'           => 'INT',
                'constraint'     => 1,
                'unsigned'       => true,
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
        $this->forge->addKey('id_notifikasi', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->addForeignKey('id_task', 'task', 'id_task');
        $this->forge->addForeignKey('id_pekerjaan', 'pekerjaan', 'id_pekerjaan');
        $this->forge->createTable('notifikasi');
    }

    public function down()
    {
        $this->forge->dropTable('notifikasi');
    }
}
