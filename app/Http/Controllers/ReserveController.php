<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
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

            return view('/mypage',)->with(['reserves'=>$reserves,
             'user_name'=>$user_name]);
    }
}
