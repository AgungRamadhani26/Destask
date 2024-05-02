<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'task';
    protected $primaryKey       = 'id_task';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_pekerjaan', 'id_user', 'id_status_task', 'id_kategori_task', 'tgl_planing',
        'tgl_selesai', 'tgl_verifikasi_diterima', 'status_verifikasi', 'persentase_selesai',
        'deskripsi_task', 'alasan_verifikasi', 'bukti_selesai', 'tautan_task'
    ];

        //get task by pekerjaan
        function getTaskByPekerjaan($idpekerjaan)
        {
            $builder = $this->table('task');
            $data = $builder->where('id_pekerjaan', $idpekerjaan)->findAll();
            if ($data != null) {
                return $data;
            } else {
                return null;
            }
        }
        //MOBILE
        //get task by pekerjaan
        public function getTaskByUser($iduser)
        {
            return $this->where('id_user', $iduser)->orderBy('id_task', 'DESC')->findAll();
        }
        
}