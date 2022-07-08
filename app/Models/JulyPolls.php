<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JulyPolls extends Model
{
    use HasFactory;

    protected $table = 'july_poll_report';

    public $timestamps = true;

    protected $fillable = [
        'id_no',
        'phone_no',
        'names',
        'polling_center',
        'ward',
        'constituency',
        'voting_status',
        'calling_agent',
        'candidate',
        'candidate_second_time',
        'call_status',
        'comments'
    ];
}
