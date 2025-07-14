<?php

namespace App\Providers;

use App\Http\Repositories\Contracts\Player\OnlinePlayerRepositoryInterface;
use App\Http\Repositories\Redis\Player\OnlinePlayerRepository;
use App\Services\Webhook\Player\StatusService;
use App\View\Constants\ViewShareKeys;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OnlinePlayerRepositoryInterface::class, OnlinePlayerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(StatusService $statusService): void
    {
        $this->loadViewShare($statusService);
    }

    /**
     * @param StatusService $statusService
     * @return void
     */
    protected function loadViewShare(StatusService $statusService): void
    {
        View::share(ViewShareKeys::MINECRAFT_ONLINE_PLAYERS_COUNT, $onlineCount = $statusService->getOnlinePlayersCount());
        View::share(ViewShareKeys::MINECRAFT_ONLINE_PLAYERS_LIMIT, $limitCount = config('minecraft.online_players_limit'));
        View::share(ViewShareKeys::MINECRAFT_ONLINE_PLAYERS_PERCENT, $statusService->getSlotsFilledPercent($onlineCount, $limitCount));

    }
}
