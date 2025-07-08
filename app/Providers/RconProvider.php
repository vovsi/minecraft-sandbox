<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Vovsi\MinecraftRcon\Rcon;

class RconProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Rcon::class, function () {
            return new Rcon(
                config('rcon.host'),
                config('rcon.port'),
                config('rcon.password'),
                config('rcon.timeout')
            );
        });
    }
}
