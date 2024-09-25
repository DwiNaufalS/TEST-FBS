<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLogin extends Model
{
    use HasFactory;

    protected $table = 'master_logins';

    protected $fillable = [
        'username',
        'password',
        'role',
    ];
}
