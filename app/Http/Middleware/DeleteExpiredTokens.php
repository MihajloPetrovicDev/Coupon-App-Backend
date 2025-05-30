<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteExpiredTokens
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if($user && $request->bearerToken()) {
            $token = $user->currentAccessToken();

            if($token && $token->expires_at && now()->greaterThan($token->expires_at)) {
                $token->delete();
            }
        }

        return $next($request);
    }
}
