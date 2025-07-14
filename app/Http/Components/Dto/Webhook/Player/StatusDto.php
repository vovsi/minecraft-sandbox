<?php

namespace App\Http\Components\Dto\Webhook\Player;

use App\Http\Components\Dto\BaseDto;
use App\Http\Enum\Webhook\Player\Status;

class StatusDto extends BaseDto
{
    /**
     * @param string $username
     * @param Status $status
     */
    public function __construct(
        public string $username,
        public Status $status,
    )
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'status' => $this->status->value,
        ];
    }
}
