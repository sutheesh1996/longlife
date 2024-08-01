<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devicename extends Model
{
    use HasFactory;

    protected $table = 'devices_name';

    protected $fillable = ['device_id'];
}
