<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallCenter extends Model
{
    use HasFactory;

    protected $table = 'july_poll_database';

    protected $fillable = [
       'first_name','other_name','last_name','id_no','phone_number','gender','DOB','polling_center','ward','secondary_ward','constituency','county','called','booked','booked_by'
    ];
}
