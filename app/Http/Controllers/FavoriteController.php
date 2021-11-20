<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
  //マイページのお気に入り解除ボタン//
  public function mypagenoFavorite($id)
  {
    $db_data = new Favorite;
    $db_data ->where('id', $id)->delete();

    return redirect('/mypage');
  }

}
