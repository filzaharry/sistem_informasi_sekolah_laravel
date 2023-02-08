<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntriesM extends Model
{
    use HasFactory;

    protected $table = 'entries';

    protected $fillable = [
        'name',
        'email',
        'ticket_id',
        'bank_id',
        'event_id',
        'picture',
        'phone',
        'city',
        'gender',
        'status',
        'is_ots',
        'generate_qr',
    ];
}
