<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

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

//Route::get('/rooms?dateCheckIn={dateIn}&dateCheckOut={dateOut}', [RoomController::class, 'filter']);

Route::get('/rooms_filter', [RoomController::class, 'filter']);

Route::get('/rooms/all', [RoomController::class, 'all']);

Route::get('/rooms/room/{id}', [RoomController::class, 'one'])->where(['id' => '[0-9]{1,5}'])->name('room');
//Route::get('/rooms/room/{id}', 'App\Http\Controllers\RoomController@one')->where(['id' => '[0-9]{1,5}'])->name('room');

Route::get('/rooms', [RoomController::class, 'all'])->name('rooms');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
