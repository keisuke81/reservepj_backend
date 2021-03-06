<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/:{shop_id}', [ShopController::class, 'getDetail']);
Route::get('menu1',[ShopController::class,'menu1','menu1']);
Route::post('/done',[ReserveController::class, 'create'])->name('getReserve');
Route::get('register',function(){
    return view('register');
});
Route::get('/favorite/{id}',[ShopController::class,'getFavorite'])->name('getFavorite');
Route::get('/nofavorite/{id}',[ShopController::class, 'noFavorite'])->name('noFavorite');
Route::get('/mypage/nofavorite/{id}',[FavoriteController::class, 'mypagenoFavorite'])->name('mypagenoFavorite');
Route::get('/mypage',[ReserveController::class,'getMypage']);
Route::get('mypage/delete_reserve/{id}',[ReserveController::class,'delete_reserve'])->name('delete_reserve');

Route::get('/qrcode/{id}', [ReserveController::class, 'show_qrcode'])->name('show_qrcode');

Route::get('/logout',[UserController::class, 'getLogout']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/update_reserve/{id}',[ReserveController::class,'getUpdate'])->name('getUpdate');

Route::post('/update', [ReserveController::class, 'update'])->name('updateReserve');

Route::post('/find_shop', [ShopController::class, 'find_shop']);
Route::get('/find_shop',[ShopController::class,'find_shop'])->name('find_shop');

Route::get('/find_area/{id}',[ShopController::class, 'find_area'])->name('find_area');

Route::get('/find_genre/{id}',[ShopController::class, 'find_genre'])->name('find_genre');

Route::post('/charge', 'StripeController@charge')->name('stripe.charge');

Route::get('/admin_shop',[ReserveController::class,'admin_shop'])->name('admin_shop');

Route::post('/admin_myshop/{id}',[ReserveController::class,'admin_myshop']);

Route::get('/admin_myshop/{id}',[ReserveController::class,'admin_myshop'])->name('admin_my_shop');

Route::post('/edit_done',[ShopController::class,'edit_done']);
Route::get('/edit_done',[ShopController::class,'edit_done']);

Route::post('/create_done',[ShopController::class,'create_done']);

Route::get('/admin',[ReserveController::class,'getAdmin']);

require __DIR__.'/auth.php';
