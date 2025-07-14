<?php

namespace App\Http\Enum\Webhook\Player;

enum Status: string
{
    case Joined = 'joined';
    case Left = 'left';
}
