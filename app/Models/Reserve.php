<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'shop_id',
        'start_at',
        'num_of_users',
    ];
}
