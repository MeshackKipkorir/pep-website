<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahooResponse extends Model
{
    use HasFactory;

    protected $table = 'mahoo_response';

    public $timestamps = true;

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
