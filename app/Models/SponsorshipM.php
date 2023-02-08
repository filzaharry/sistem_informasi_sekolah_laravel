<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorshipM extends Model
{
    use HasFactory;

    protected $table = 'sponsorship';

    protected $fillable = [
        'name',
        'picture',
        'address',
        'contact',
        'contact_phone',
        'event_id',
        'nominal',
    ];
}
