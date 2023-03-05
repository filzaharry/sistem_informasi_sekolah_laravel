<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLevels extends Model
{
    use HasFactory;

    protected $table = 'level_users';

    protected $fillable = [
        'id',
        'nama',
        'status',
    ];
}
