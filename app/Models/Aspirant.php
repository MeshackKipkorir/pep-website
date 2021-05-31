<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirant extends Model
{
    use HasFactory;

    protected $table = 'aspirants';

    protected $fillable = [
        'surname','other_names','mobile_no','email','id_number','dob',
        'gender','position','special_interest','county','constituency','ward'
    ];
}
