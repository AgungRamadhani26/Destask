<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HariLibur extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_hari_libur' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'tanggal_libur' => [
                'type'       => 'DATE',
                'null'       => true
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
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
        $this->forge->addKey('id_hari_libur', true);
        $this->forge->createTable('hari_libur');
    }

    public function down()
    {
        $this->forge->dropTable('hari_libur');
    }
}
