<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('item/send', [ItemController::class, 'sendForm'])->name('item.send-form');
Route::post('item/send', [ItemController::class, 'send'])->name('item.send');
