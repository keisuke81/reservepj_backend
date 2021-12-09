<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'id,',
        'name',
        'area_id',
        'genre_id',
        'description',
        'img_url',
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'shop_id');
    }

    public function is_liked_by_auth_user()
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