<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiM extends Model
{
    use HasFactory;
    protected $table = 'data_nilai';

    protected $fillable = [
        'id',
        'pengurus_id',
        'siswa_id',
        'kelas_id',
        'mapel_id',
        'jenis',
        'semester',
        'nilai',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
