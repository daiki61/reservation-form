<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginUserController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::middleware('auth')->group(function () {
    Route::get('/',[ShopController::class, 'shopall'])->name('shop.all');
//});

Route::get('/detail/{shop_id}',[ShopController::class, 'detail'])->name('shop.detail');
//Route::post('/detail/{shop_id}',[ShopController::class, 'reservation'])->name('shop.info');
//店舗詳細ページの入力内容の確認用Route::post('/shop/{shop_id}/detail', [ShopController::class, 'showDetails'])->name('shop.detail');
Route::post('/reservation', [ShopController::class, 'store'])->name('reservation.shop');
Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');
Route::get('/done',[ShopController::class, 'done']);

Route::get('/register',[RegisteredUserController::class, 'showRegistrationForm']);
Route::post('/register',[RegisteredUserController::class, 'register']);
Route::get('/thanks',[RegisteredUserController::class, 'thanks']);
Route::get('/mypage',[RegisteredUserController::class, 'mypage']);

Route::get('/login',[LoginUserController::class, 'showLoginForm']);

Route::post('/login',[LoginUserController::class, 'login']);
