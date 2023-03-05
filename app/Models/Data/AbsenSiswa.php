<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenSiswa extends Model
{
    use HasFactory;
    protected $table = 'data_absen_siswa';

    protected $fillable = [
        'id',
        'siswa_id',
        'clockin',
        'clockout',
        'keterangan',
        'status',
        'alasan',
        'foto_surat',
    ];
}
