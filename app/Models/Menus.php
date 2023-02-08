<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $fillable = [
        'id',
        'nama_menu', 
        'level_menu',
        'master_menu',
        'url',
        'icon',
        'aktif',
        'sort',
        'sort_sub',
        'is_parent',
    ];
}
