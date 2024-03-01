<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TargetPoinHarian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_target_poin_harian' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
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
            'bulan' => [
                'type'       => 'VARCHAR',
                'constraint' => 2,
                'null'       => true
            ],
            'jumlah_target_poin_harian' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'jumlah_hari_kerja' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'jumlah_hari_libur' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'jumlah_target_poin_sebulan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
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
        $this->forge->addKey('id_target_poin_harian', true);
        $this->forge->addForeignKey('id_usergroup', 'usergroup', 'id_usergroup');
        $this->forge->createTable('target_poin_harian');
    }

    public function down()
    {
        $this->forge->dropTable('target_poin_harian');
    }
}
