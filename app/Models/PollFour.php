<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollFour extends Model
{
    use HasFactory;

    protected $table = 'poll_four';

    protected $fillable = [
        'id_no',
        'phone_no',
        'names',
        'polling_center',
        'voting_status',
        'calling_agent',
        'candidate',
        'candidate_second_time',
        'call_status'
    ];
}
