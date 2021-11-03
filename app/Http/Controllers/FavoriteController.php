<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\models\User;


class FavoriteController extends Controller
{
    public function getFavorite($id)
    {
      $favorite = new Favorite;
      $favorite->user_id=User::id();
      $favorite->shop_id=$id;
      $favorite->save();

      return redirect('/');
    }

    public function noFavorite($id)
    {
        $user_id=User::id();
        $favorite=Favorite::where('user_id',$user_id)->where('shop_id',$id)->first();
        $favorite->delate();

        return redirect('/');
    }

}
