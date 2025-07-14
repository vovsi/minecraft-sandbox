<?php

namespace App\Http\Repositories\Contracts\Player;

interface OnlinePlayerRepositoryInterface
{
    /**
     * @param string $username
     * @param array $data
     * @return array
     */
    public function add(string $username, array $data): array;

    /**
     * @param string $username
     * @return bool
     */
    public function remove(string $username): bool;

    /**
     * @return int
     */
    public function getOnlinePlayersCount(): int;
}
