<?php

namespace App\Http\Controllers;

use App\Http\Components\Requests\Item\SendRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Vovsi\MinecraftRcon\dto\item\GiveDto;
use Vovsi\MinecraftRcon\Rcon;
use Vovsi\MinecraftRcon\resources\ItemResource;

class ItemController extends Controller
{
    /**
     * @param string $username
     * @return View
     */
    public function sendForm(
        #[\Illuminate\Container\Attributes\Config('minecraft.player_username')] string $username
    ): View
    {
        return view('item.send', ['username' => $username]);
    }

    /**
     * @param SendRequest $request
     * @param Rcon $rcon
     * @return RedirectResponse
     */
    public function send(SendRequest $request, Rcon $rcon): RedirectResponse
    {
        if ($rcon->connect()) {
            $response = new ItemResource($rcon)->give(new GiveDto($request->username, $request->item, $request->amount));
        }

        return redirect(route('item.send'))->with('status', $response);
    }
}
