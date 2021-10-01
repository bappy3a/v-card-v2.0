<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }else{
        return redirect()->route('register');
    }
});

Auth::routes();

Route::get('/qrcodedownload/{id}', [HomeController::class, 'qrcodedownload'])->name('download.qrcode');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::resource('card', CardController::class);
Route::get('card/delete/{card}', [CardController::class, 'destroy'])->name('card.delete');
Route::get('{username}', [CardController::class, 'username'])->name('card.username');

Route::get('user/profile', [HomeController::class, 'profile'])->name('profile');
Route::post('profile/update', [HomeController::class, 'profile_update'])->name('profile.update');

Route::group(['middleware'=>['auth','admin']],function(){
    //Route::view('/dashboard', 'app.home')->name('home');
});

Route::group(['middleware'=>['auth','admin']],function(){
    //Route::view('/dashboard', 'app.home')->name('home');
});