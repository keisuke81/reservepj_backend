<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    //ログイン時のみ動作有効//
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['create']);
    }
    //店予約//
    public function create(Request $request)
    {
        $user = Auth::user();
        $user_id = Auth::id();

        $param=[
            'user_id'=>$user_id,
            'shop_id'=>$request->id,
            'date'=>$request->date,
            'time'=>$request->time,
            'num_of_users'=>$request->num_of_users
        ];

        Reserve::create($param);

        return view('done');
    }

    public function getMypage(Reserve $user_id)
    {
        $user_id = Auth::id();

        $reserves = Reserve::where('user_id', $user_id)->get();
        $user = User::where('id', $user_id)->first();
        $user_name = $user->name;

        
        foreach ($reserves as $reserve) {

            $shop = Shop::where('id', $reserve->shop_id)->first();
            $reserve->shop_name = $shop->name;
            $user_id = $reserve->user_id;
            $date = $reserve->date;
            $time = $reserve->time;
            $number = $reserve->num_of_users;

        }
        $favorites = Favorite::where('user_id', $user_id)->get();

        foreach ($favorites as $favorite) {
            $shop = Shop::where('id', $favorite->shop_id)->first();
            $favorite->shop_name = $shop->name;
            $favorite->shop_img  = $shop->img_url;

            $area = Area::where('id', $shop->area_id)->first();
            $favorite->area_name = $area->name;

            $genre = Genre::where('id', $shop->genre_id)->first();
            $favorite->genre_name = $genre->name;

        }

            return view('/mypage',)->with(['reserves'=>$reserves,
             'user_name'=>$user_name,
             'favorites'=>$favorites,
            ]);
    }
}
