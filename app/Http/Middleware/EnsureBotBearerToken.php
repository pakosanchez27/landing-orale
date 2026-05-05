<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureBotBearerToken
{
    public function handle(Request $request, Closure $next): Response
    {
        $configuredToken = (string) config('services.crm_bot.token', env('CRM_BOT_API_TOKEN', ''));
        $incomingToken = (string) $request->bearerToken();

        if ($configuredToken === '' || ! hash_equals($configuredToken, $incomingToken)) {
            return new JsonResponse([
                'ok' => false,
                'message' => 'No autorizado.',
            ], 401);
        }

        return $next($request);
    }
}
