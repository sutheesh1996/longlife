<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'devices';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'device_name',
        'device_id',
        'mobile_number',
    ];
}
