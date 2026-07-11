<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale', 'en');
        app()->setLocale($locale);

        if ($locale === 'ar') {
            config(['app.direction' => 'rtl']);
        }

        return $next($request);
    }
}
