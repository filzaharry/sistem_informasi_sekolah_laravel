<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasM extends Model
{
    use HasFactory;
    protected $table = 'data_kelas';

    protected $fillable = [
        'id',
        'kategori',
        'clockin',
        'clockout',
        'kelas',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
