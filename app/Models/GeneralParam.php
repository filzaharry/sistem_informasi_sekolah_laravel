<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralParam extends Model
{
    use HasFactory;

    protected $table = 'general_parameter';

    protected $fillable = [
        'params',
        'value',
        'type',
        'status',
    ];
}
