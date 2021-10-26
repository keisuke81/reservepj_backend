<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
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
}
