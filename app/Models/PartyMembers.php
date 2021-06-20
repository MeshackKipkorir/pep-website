<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyMembers extends Model
{
    use HasFactory;

    protected $table = 'party_members';

    protected $fillable = [
        'first_name','other_name','last_name','id_no','phone_number','gender','DOB','polling_center','ward','constituency','county','current_party','profession'
    ];
}
