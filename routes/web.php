<?php

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
        return view('welcome');
});


Auth::routes();

Route::get('/t/create',[App\Http\Controllers\TweetsController::class, 'create']);

Route::post('/t',[App\Http\Controllers\TweetsController::class, 'store']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');


Route::delete('/profile/{id}',[App\Http\Controllers\TweetsController::class, 'delete_tweet'])->name('profile.delete_tweet');

