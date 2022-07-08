<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseB extends Model
{
    use HasFactory;

    protected $table = 'response_b';
    protected $fillable = [
                            'id_no',
                            'phone_no',
                            'names',
                            'polling_center',
                            'voting_status',
                            'candidate',
                            'voting_reason',
                            'received_token',
                            'received_token_from',
                            'received_token_amount',
                            'party',
                            'party_symbol',
                            'party_slogan',
                            'official_name',
                            'be_our_agent',
                            'advanced_payment',
                            'vote_for_kabobo',
                            'mobilize'];
}
