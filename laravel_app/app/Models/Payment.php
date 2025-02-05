<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_id',
        'payer_id',
        'payer_email',
        'amount',
        'currency',
        'payment_status',
        'payment_date',
    ];
}
