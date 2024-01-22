<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusPekerjaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status_pekerjaan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_status_pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true
            ],
            'deskripsi_status_pekerjaan' => [
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
        $this->forge->addKey('id_status_pekerjaan', true);
        $this->forge->createTable('status_pekerjaan');
    }

    public function down()
    {
        $this->forge->dropTable('status_pekerjaan');
    }
}
