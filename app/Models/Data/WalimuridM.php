<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalimuridM extends Model
{
    use HasFactory;
    protected $table = 'data_walimurid';

    protected $fillable = [
        'id',
        'alamat',
        'gender',
        'no_ktp',
        'nama',
        'no_telp',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
