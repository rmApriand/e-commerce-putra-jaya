<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'nama_user',
        'alamat_user',
        'no_hp_user',
        'email_user',
        'password_user',
        'kode_role'
    ];

}
