<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Task extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_task' => [
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
            'creator' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_status_task' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_kategori_task' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'tgl_planing' => [
                'type'       => 'DATE',
                'null'       => true
            ],
            'tgl_selesai' => [
                'type'       => 'DATE',
                'null'       => true
            ],
            'tgl_verifikasi_diterima' => [
                'type'       => 'DATE',
                'null'       => true
            ],
            'status_verifikasi' => [
                'type'           => 'INT',
                'constraint'     => 1,
                'unsigned'       => true,
                'null'  => true
            ],
            'persentase_selesai' => [
                'type'           => 'INT',
                'constraint'     => 3,
                'unsigned'       => true,
                'null'  => true
            ],
            'deskripsi_task' => [
                'type'       => 'TEXT',
                'null'  => true,
            ],
            'alasan_verifikasi' => [
                'type'       => 'TEXT',
                'null'  => true,
            ],
            'bukti_selesai' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'tautan_task' => [
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
        $this->forge->addKey('id_task', true);
        $this->forge->addForeignKey('id_pekerjaan', 'pekerjaan', 'id_pekerjaan');
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->addForeignKey('id_status_task', 'status_task', 'id_status_task');
        $this->forge->addForeignKey('id_kategori_task', 'kategori_task', 'id_kategori_task');
        $this->forge->createTable('task');
    }

    public function down()
    {
        $this->forge->dropTable('task');
    }
}
