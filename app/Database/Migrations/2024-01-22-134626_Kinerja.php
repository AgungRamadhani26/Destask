<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kinerja extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kinerja' => [
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
            'tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => 4,
                'null'       => true
            ],
            'bulan' => [
                'type'       => 'VARCHAR',
                'constraint' => 2,
                'null'       => true
            ],
            'jumlah_kehadiran' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'jumlah_izin' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'jumlah_sakit_tnp_ket_dokter' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'jumlah_mangkir' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'jumlah_terlambat' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'kebersihan_diri' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'kerapihan_penampilan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'integritas_a' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'integritas_b' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'integritas_c' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'kerjasama_a' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'kerjasama_b' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'kerjasama_c' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'kerjasama_d' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'orientasi_thd_konsumen_a' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'orientasi_thd_konsumen_b' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'orientasi_thd_konsumen_c' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'orientasi_thd_konsumen_d' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'orientasi_thd_target_a' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'orientasi_thd_target_b' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'orientasi_thd_target_c' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'orientasi_thd_target_d' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'inisiatif_inovasi_a' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'inisiatif_inovasi_b' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'inisiatif_inovasi_c' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'inisiatif_inovasi_d' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'professionalisme_a' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'professionalisme_b' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'professionalisme_c' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'professionalisme_d' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'organizational_awareness_a' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'organizational_awareness_b' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'organizational_awareness_c' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'  => true
            ],
            'score_kpi' => [
                'type'           => 'FLOAT',
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
        $this->forge->addKey('id_kinerja', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->createTable('kinerja');
    }

    public function down()
    {
        $this->forge->dropTable('kinerja');
    }
}
