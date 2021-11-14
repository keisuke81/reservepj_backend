<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ShopController;
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
Route::get('/favorite/{id}', [FavoriteController::class, 'getFavorite'])->name('getFavorite');
Route::get('/favorite/{id}', [FavoriteController::class, 'noFavorite'])->name('noFavorite');
Route::get('menu1',[ShopController::class,'menu1','menu1']);
Route::post('/done',[ReserveController::class, 'create']);
Route::get('register',function(){
    return view('register');
});
Route::post('/',[FavoriteController::class,'getFavorite']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
