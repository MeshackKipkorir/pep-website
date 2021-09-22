<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KiaguRegisteredVoters extends Model
{
    use HasFactory;

    protected $table = 'kiagu_registered_voters';

    public $timestamps = false;
    protected  $fillable = ['id_no','phone_number'];


}
