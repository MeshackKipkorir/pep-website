<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diaspora extends Model
{
    use HasFactory;

    protected  $table = 'diaspora_registration';

    protected $fillable = [
        'name','gender','email','diaspora_phone_number','local_phone_number','passport_no',
        'county','constituency','ward','country_of_residence','state_of_residence','city_of_residence','profession'
    ];
}
