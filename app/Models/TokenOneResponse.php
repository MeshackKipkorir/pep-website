<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenOneResponse extends Model
{
    use HasFactory;
    protected  $table = 'call_center_two';

    protected $fillable = [
        'id_no',
        'phone_no',
        'names',
        'polling_center',
        'voting_status',
        'calling_agent',
        'candidate',
        'voting_reason',
        'call_status',
        'consider_kabobo',
        'make_you_vote',
        'received_token',
        'current_token_no',
        'updated_token_no',
        'mobilize_for_kabobo'
    ];
}
