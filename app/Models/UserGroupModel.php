<?php

namespace App\Models;

use CodeIgniter\Model;

class UserGroupModel extends Model
{
    protected $table            = 'usergroup';
    protected $primaryKey       = 'id_usergroup';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'nama_usergroup', 'deskripsi_usergroup'
    ];
}
