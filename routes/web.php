<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['username' => config('app.player_username')]);
})->name('home');

Route::post('item/send', [ItemController::class, 'send'])->name('item.send');
