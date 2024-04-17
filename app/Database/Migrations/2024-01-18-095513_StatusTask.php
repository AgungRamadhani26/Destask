<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusTask extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status_task' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_status_task' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true
            ],
            'deskripsi_status_task' => [
                'type'       => 'TEXT',
                'null'  => true,
            ],
            'color' => [
                'type'       => 'VARCHAR',
                'constraint' => 11,
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
        $this->forge->addKey('id_status_task', true);
        $this->forge->createTable('status_task');
    }

    public function down()
    {
        $this->forge->dropTable('status_task');
    }
}
