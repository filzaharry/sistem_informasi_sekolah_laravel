<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusM extends Model
{
    use HasFactory;
    protected $table = 'data_pengurus';

    protected $fillable = [
        'id',
        'jabatan_id',
        'no_ktp',
        'foto_profil',
        'nama',
        'tgl_lahir',
        'alamat',
        'gender',
        'status',
        'no_telp',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
