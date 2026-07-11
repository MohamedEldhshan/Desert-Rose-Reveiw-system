<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class HandleRateLimitExceeded
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($response->status() === 429) {
            Log::warning('Rate limit exceeded', [
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
                'user_agent' => $request->userAgent(),
            ]);

            // Return user-friendly error instead of default 429
            return back()
                ->withInput()
                ->with('error', 'You have submitted too many requests. Please wait a moment before trying again.');
        }

        return $response;
    }
}
