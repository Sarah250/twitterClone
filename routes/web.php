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

Route::group(['middleware' => 'auth'], function () {
        Route::get('/', function () {
            return view('welcome');
       });
    });


Auth::routes();

Route::get('/t/create',[App\Http\Controllers\TweetsController::class, 'create']);
Route::post('/t',[App\Http\Controllers\TweetsController::class, 'store']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit',[App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}/edit',[App\Http\Controllers\ProfilesController::class, 'change_password'])->name('profile.change_password');

Route::delete('/profile/{id}',[App\Http\Controllers\TweetsController::class, 'delete_tweet'])->name('profile.delete_tweet');

Route::patch('/profile/up/{id}/{user}',[App\Http\Controllers\TweetsController::class, 'up'])->name('profile.up');
Route::patch('/profile/down/{id}/{user}',[App\Http\Controllers\TweetsController::class, 'down'])->name('profile.down');