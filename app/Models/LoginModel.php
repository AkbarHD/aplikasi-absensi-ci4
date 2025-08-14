<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    // untuk table
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pegawai', 'username', 'password', 'status', 'role'];
}
