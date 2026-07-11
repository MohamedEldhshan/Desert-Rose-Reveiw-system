<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LimitRequestSize
{
    public function handle(Request $request, Closure $next): Response
    {
        $maxSize = 1024 * 10; // 10KB max for review submission
        
        if ($request->is('reviews') && $request->method() === 'POST') {
            $contentSize = strlen($request->getContent());
            
            if ($contentSize > $maxSize) {
                return back()
                    ->withInput()
                    ->with('error', 'Request too large. Please reduce the size of your submission.');
            }
        }

        return $next($request);
    }
}
