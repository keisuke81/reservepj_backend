<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    public function getFavorite(Request $request)
    {
    $user_id = Auth::id();

    $param = [
      'user_id' => $user_id,
      'shop_id' => $request->id,
    ];

    Favorite::create($param);

    return redirect('/');
    }

}
