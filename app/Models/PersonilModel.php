<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonilModel extends Model
{
    protected $table            = 'personil';
    protected $primaryKey       = 'id_personil';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_user_pm', 'desainer1', 'desainer2', 'be_web1', 'be_web2', 'be_web3',
        'be_mobile1', 'be_mobile2', 'be_mobile3', 'fe_web1', 'fe_mobile1'
    ];
}
