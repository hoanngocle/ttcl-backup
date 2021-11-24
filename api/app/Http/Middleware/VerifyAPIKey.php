<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class VerifyAPIKey
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->header('Api-Authorization')) {
            $apiKey = $request->header('Api-Authorization');
            if ($apiKey == env('API_KEY')) {
                return $next($request);
            } else {
                Log::debug('1');
                return response()->json([
                    'code' => 403,
                    'errors' => 'API key is not valid',
                ]);
            }
        }

        return response()->json([
            'code' => 403,
            'errors' => 'API Authorization failed',
        ]);
    }
}