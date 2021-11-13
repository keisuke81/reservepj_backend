<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
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
            'start_at'=>$request->date,
            'num_of_users'=>$request->num_of_users
        ];

        Reserve::create($param);

        return view('done');
    }
}
