<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventM extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
        'id',
        'name',
        'desc',
        'start',
        'end',
        'address',
        'is_online',
        'kuota',
        'picture',
        'status',
        'status_ticket',
        'email',
        'phone',
        'client',
        'company',
    ];
}
