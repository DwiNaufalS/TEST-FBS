<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLoginAdmin extends Model
{
    use HasFactory;

    protected $table = 'master_login_admin';

    protected $fillable = [
        'username',
        'password',
        'role',
    ];

}
