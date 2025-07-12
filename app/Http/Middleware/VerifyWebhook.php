<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyWebhook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->has('token') || $request->get('token') !== config('services.minecraft.token')) {
            abort(Response::HTTP_UNAUTHORIZED, 'Webhook token mismatch');
        }

        return $next($request);
    }
}
