<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResourceSendRequest;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Vovsi\MinecraftRcon\dto\item\GiveDto;
use Vovsi\MinecraftRcon\Rcon;
use Vovsi\MinecraftRcon\resources\ItemResource;

class ItemController extends Controller
{
    /**
     * @param ResourceSendRequest $request
     * @param Rcon $rcon
     * @return Application|RedirectResponse|Redirector|object
     */
    public function send(ResourceSendRequest $request, Rcon $rcon)
    {
        if ($rcon->connect()) {
            $response = new ItemResource($rcon)->give(new GiveDto($request->username, $request->item, $request->amount));
        }

        return redirect(route('home'))->with('status', $response);
    }
}
