<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Components\Dto\Webhook\Player\StatusDto;
use App\Http\Components\Requests\Webhook\Player\StatusRequest;
use App\Http\Controllers\Controller;
use App\Services\Webhook\Player\StatusService;

class PlayerController extends Controller
{
    /**
     * @param StatusRequest $request
     * @param StatusService $service
     * @return bool
     */
    public function status(StatusRequest $request, StatusService $service): bool
    {
        return $service->statusChanged(new StatusDto(
            $request->username,
            $request->status(),
        ));
    }
}
