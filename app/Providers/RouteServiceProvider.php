<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        RateLimiter::for('reviews', function (Request $request) {
            return Limit::perMinute(3)
                ->by($request->ip())
                ->response(function () {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Too many review submissions. Please wait 1 minute before trying again.');
                });
        });

        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
