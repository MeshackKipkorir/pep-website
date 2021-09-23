<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseA extends Model
{
    use HasFactory;

    protected $table = 'response_a';

    protected $fillable = [
        'id_no','phone_no','names','polling_center','voting_status','calling_agent','candidate', 'voting_reason','call_status'
    ];
}
