<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User1 extends Model
{
    use HasFactory;

    protected $table = 'user1'; // specify the table name

    protected $fillable = [
        'name',
        'mobile',
    ];
}
