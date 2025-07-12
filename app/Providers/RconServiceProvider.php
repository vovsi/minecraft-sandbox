<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Vovsi\MinecraftRcon\Rcon;

class RconServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * @return void
     */
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

    /**
     * @return array
     */
    public function provides(): array
    {
        return [Rcon::class];
    }
}
