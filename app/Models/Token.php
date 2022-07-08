<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected  $table = 'token_one';

    protected $fillable = [
        'id_no','first_name','middle_name','last_name','mobile_no','gender','issue','polling_station','amount'
    ];

}
