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
Route::get('/logout',[UserController::class, 'getLogout']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
