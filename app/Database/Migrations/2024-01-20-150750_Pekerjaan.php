<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pekerjaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pekerjaan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_status_pekerjaan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_kategori_pekerjaan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nama_pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'pelanggan' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true
            ],
            'jenis_layanan' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true
            ],
            'nominal_harga' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'deskripsi_pekerjaan' => [
                'type'       => 'TEXT',
                'null'  => true,
            ],
            'target_waktu_selesai' => [
                'type'       => 'DATE',
                'null'       => true
            ],
            'persentase_selesai' => [
                'type'           => 'INT',
                'constraint'     => 3,
                'unsigned'       => true,
                'null'  => true
            ],
            'waktu_selesai' => [
                'type'       => 'DATE',
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
        $this->forge->addKey('id_pekerjaan', true);
        $this->forge->addForeignKey('id_status_pekerjaan', 'status_pekerjaan', 'id_status_pekerjaan');
        $this->forge->addForeignKey('id_kategori_pekerjaan', 'kategori_pekerjaan', 'id_kategori_pekerjaan');
        $this->forge->createTable('pekerjaan');
    }

    public function down()
    {
        $this->forge->dropTable('pekerjaan');
    }
}
