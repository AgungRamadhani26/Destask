<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BobotKategoriTask extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bobot_kategori_task' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_kategori_task' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_usergroup' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true
            ],
            'bobot_poin' => [
                'type'       => 'INT',
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
        $this->forge->addKey('id_bobot_kategori_task', true);
        $this->forge->addForeignKey('id_kategori_task', 'kategori_task', 'id_kategori_task');
        $this->forge->addForeignKey('id_usergroup', 'usergroup', 'id_usergroup');
        $this->forge->createTable('bobot_kategori_task');
    }

    public function down()
    {
        $this->forge->dropTable('bobot_kategori_task');
    }
}
