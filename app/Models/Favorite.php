<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function is_liked_by_auth_user_favorite()
    {
        $id = Auth::id();

        $favoriters = array();
        foreach ($this->favorites as $favorite) {
            array_push($favoriters, $favorite->user_id);
        }

        if (in_array($id, $favoriters)) {
            return true;
        } else {
            return false;
        }
    }

}
