<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Pagination\Paginator::useTailwind();

        RateLimiter::for('reviews', function (Request $request) {
            return Limit::perHour(3)
                ->by($request->ip())
                ->response(function () {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Too many review submissions. Please wait before trying again.');
                });
        });
    }
}
