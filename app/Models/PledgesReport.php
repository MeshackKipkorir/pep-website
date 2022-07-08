<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PledgesReport extends Model
{
    use HasFactory;

    protected $table = 'pledges_report';
    protected $guarded = [];
}
