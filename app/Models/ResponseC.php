<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseC extends Model
{
    use HasFactory;

    protected $table = 'response_c';
    protected $fillable = [
        'id_no',
        'phone_no',
        'names',
        'polling_center',
        'confirm_receive_token',
        'vote_for_kabobo',
        'will_mobilize'
    ];
}
