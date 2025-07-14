<?php

namespace App\Services\Webhook\Player;

use App\Http\Components\Dto\Webhook\Player\StatusDto;
use App\Http\Enum\Webhook\Player\Status;
use App\Http\Repositories\Contracts\Player\OnlinePlayerRepositoryInterface;

class StatusService
{
    public function __construct(private readonly OnlinePlayerRepositoryInterface $onlinePlayerRepository)
    {
    }

    /**
     * @param StatusDto $dto
     * @return bool
     */
    public function statusChanged(StatusDto $dto): bool
    {
        return match ($dto->status) {
            Status::Joined => $this->playerJoined($dto),
            Status::Left => $this->playerLeft($dto)
        };
    }

    /**
     * @param StatusDto $dto
     * @return bool
     */
    public function playerJoined(StatusDto $dto): bool
    {
        return !empty($this->onlinePlayerRepository->add($dto->username, $dto->toArray()));
    }

    /**
     * @param StatusDto $dto
     * @return bool
     */
    public function playerLeft(StatusDto $dto): bool
    {
        return $this->onlinePlayerRepository->remove($dto->username);
    }

    /**
     * @return int
     */
    public function getOnlinePlayersCount(): int
    {
        return $this->onlinePlayerRepository->getOnlinePlayersCount();
    }

    /**
     * @param int $onlineCount
     * @param int $limitCount
     * @return int
     */
    public function getSlotsFilledPercent(int $onlineCount, int $limitCount): int
    {
        return $onlineCount / $limitCount * 100;
    }
}
