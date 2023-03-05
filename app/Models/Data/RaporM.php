<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaporM extends Model
{
    use HasFactory;
    protected $table = 'data_rapor';

    protected $fillable = [
        'id',
        'pengurus_id',
        'siswa_id',
        'kelas_id',
        'praktek',
        'teori',
        'uts',
        'uas',
        'nilai_rata',
        'peringkat',
        'nilai_akhir',
        'semester',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
