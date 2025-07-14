<?php

namespace App\Http\Repositories\Redis\Player;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\Contracts\Player\OnlinePlayerRepositoryInterface;
use Illuminate\Support\Facades\Redis;

class OnlinePlayerRepository extends BaseRepository implements OnlinePlayerRepositoryInterface
{
    private const string ONLINE_PLAYERS_SET = 'minecraft_online_players';
    private const string PLAYER_KEY_PREFIX = 'minecraft_player:';

    /**
     * @param string $username
     * @param array $data
     * @return array
     */
    public function add(string $username, array $data): array
    {
        $saddR = Redis::sadd(self::ONLINE_PLAYERS_SET, $username);
        $hmsetR = Redis::hmset(self::PLAYER_KEY_PREFIX . $username, $data);

        return $saddR && $hmsetR ? $data : [];
    }

    /**
     * @param string $username
     * @return bool
     */
    public function remove(string $username): bool
    {
        $sremR = Redis::srem(self::ONLINE_PLAYERS_SET, $username);
        $delR = Redis::del(self::PLAYER_KEY_PREFIX . $username);

        return $sremR && $delR;
    }

    public function getOnlinePlayersCount(): int
    {
        return Redis::scard(self::ONLINE_PLAYERS_SET);
    }
}
