<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarchPolls extends Model
{
    use HasFactory;

    protected $table = 'march_poll_results';

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
