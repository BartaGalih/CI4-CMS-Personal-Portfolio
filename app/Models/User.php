<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = "username";
    protected $returnType    = "object";
    protected $allowedFields = ['username', 'password', 'name'];

    protected $useTimestamps = true;
}
