<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoPhone extends Model
{
    use HasFactory;

    protected $table = 'no_phone';

    protected  $fillable  = [
      'first_name','id_no','middle_name','last_name','age','level_of_education','occupation','gender','polling_station'
    ];
}
