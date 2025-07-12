<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Http\Requests\Webhook\Player\StatusRequest;

class PlayerController extends Controller
{
    /**
     * @param StatusRequest $request
     * @return true
     */
    public function status(StatusRequest $request): true
    {
        // $request->content

        return true;
    }
}
