<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallCenter extends Model
{
    use HasFactory;

    protected $table = 'poll_four_db';

    protected $fillable = [
        'called','booked','booked_by'
    ];
}