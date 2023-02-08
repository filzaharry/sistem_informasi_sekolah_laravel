<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketM extends Model
{
    use HasFactory;

    protected $table = 'ticket';

    protected $fillable = [
        'name',
        'price',
        'kuota',
    ];
}
