<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperMobilizer extends Model
{
    use HasFactory;

    protected $table = 'super_mobilizer';

    protected $fillable = [
        'first_name','middle_name','last_name','id_no','super_id','mobile_no','gender','polling_station','recruitment_status','agent_type','reason','call_status','calling_agent'
    ];

}
