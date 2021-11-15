<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    //店舗一覧ページの表示//
    public function index()
    {
        $items = Shop::all();
        foreach ($items as $item) {
            $area = Area::where('id', $item->area_id)->first();
            $item->area_name = $area->name;

            $genre = Genre::where('id', $item->genre_id)->first();
            $item->genre_name = $genre->name;
        }
        return view('index',['items'=>$items]);
    }

    //店舗詳細ページの表示//
    public function getDetail(Shop $shop_id)
    {
        $item = Shop::find($shop_id)->last();
            $area = Area::where('id', $item->area_id)->first();
            $item->area_name = $area->name;

            $genre = Genre::where('id', $item->genre_id)->first();
            $item->genre_name = $genre->name;

        return view('/detail', ['item' => $item]);
    }

    //menu1の表示//
    public function menu1()
    {
        return view('menu1');
    }
    //お気に入り登録//
    public function getFavorite($id)
    {


        Favorite::create([
            'user_id' => Auth::id(),
            'shop_id' => $id,
        ]);
        session()->flash('success', 'お気に入りに追加しました');

        return redirect('/');
    }

    //お気に入り解除//
    public function noFavorite($id)
    {
        $favorite = Favorite::where('shop_id', $id)->where('user_id', Auth::id())->first();
        $favorite->delete();

        session()->flash('success', 'お気に入り解除しました');

        return redirect('/');
    }
}
