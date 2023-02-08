<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesMenu extends Model
{
    use HasFactory;

    protected $table = 'akses';

    protected $fillable = [
        'level_user_id',
        'menu_id',
        'akses',
        'tambah',
        'edit',
        'hapus',
        'detail',
        'export',
    ];
}
