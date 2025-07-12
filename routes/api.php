<?php

use App\Http\Controllers\Webhook\PlayerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['webhook.token'])->group(function () {
    Route::post('webhook/player/status', [PlayerController::class, 'status']);
});
