<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = [
        'id_no','first_name','middle_name','last_name','mobile_no','gender','t_shirt','leso','apron','overall','cash_token_one','cash_token_two','requested','issued','sent','polling_station'
    ];
}
