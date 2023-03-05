<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaM extends Model
{
    use HasFactory;
    protected $table = 'data_siswa';

    protected $fillable = [
        'id',
        'foto_profil',
        'nis',
        'nama',
        'tgl_lahir',
        'tempat_lahir',
        'alamat',
        'gender',
        'no_telp',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
