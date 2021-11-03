<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    public function user()
    {
        return $this->belongTo('App\User');
    }

    public function shop()
    {
        return $this->belongTo('App\Shop');
    }

    protected $fillable = [
        'user_id', 'shop_id'
    ];
    
    protected $guarded = [
        'id'
    ];
}
