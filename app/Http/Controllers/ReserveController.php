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
use App\Http\Requests\ClientRequest;

class ReserveController extends Controller
{
    //ログイン時のみ動作有効//
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['create']);
    }
    //店予約//
    public function create(ClientRequest $request)
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

    //マイページの遷移//
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

    //予約取り消し//
    public function delete_reserve($id){

        $delete_data = new Reserve;
        $delete_data->where('id', $id)->delete();

        return redirect('/mypage'); 
    }

    public function show_qrcode($id){

        $qrcode_data = Reserve::where('id',$id)->first();

        $shop = Shop::where('id', $qrcode_data->shop_id)->first();
        $qrcode_data->shop_name = $shop->name;

        $user = User::where('id', $qrcode_data->user_id)->first();
        $qrcode_data->user_name = $user->name;

        $param=[
            $qrcode_data->shop_name,
            $qrcode_data->user_name,
            $qrcode_data->date,
            $qrcode_data->time
        ];

        return view('/qrcode', ['param'=>$param
        ]);
    }

    //予約変更ページへの繊維//
    public function getUpdate($id){
        $update_data = Reserve::where('id', $id)->first();

        $shop = Shop::where('id', $update_data->shop_id)->first();
        $update_data->shop_name = $shop->name;

        $user = User::where('id', $update_data->user_id)->first();
        $update_data->user_name = $user->name;

        $param = [
            $update_data->shop_name,
            $update_data->user_name,
            $update_data->date,
            $update_data->time,
            $update_data->num_of_users,
            $update_data->id
        ];

        return view('update', [
            'param' => $param
        ]);
    }

    //予約の変更//
    public function update(Request $request){

        $update_data = [
            'date'=>$request->update_date,
            'time'=>$request->update_time,
            'num_of_users'=>$request->update_num_of_users
        ];

        Reserve::where('id', $request->id)->update($update_data);

        return view('done');

    }

    //店舗代表者用の管理画面の表示//
    public function admin_shop(){
        return view('admin_shop');
    }

    //自分の店舗の管理画面を表示//
    public function admin_myshop(Request $request, $id){
        $id = $request->shop_number;

        $reserves = Reserve::where('shop_id',$id)->get();

        foreach ($reserves as $reserve) {
            $user = User::where('id', $reserve->user_id)->first();
            $user_name = $user->name;
        }
        


        return view('admin_myshop')->with(['id'=>$id, 'reserves'=>$reserves,
        'user_name'=>$user_name]);
    }
}
