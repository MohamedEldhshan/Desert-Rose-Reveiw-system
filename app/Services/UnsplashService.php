<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UnsplashService
{
    public function getHerbImage(string $herbName): string
    {
        $key = config('services.unsplash.key');

        if (!$key || $key === '[PUT_YOUR_UNSPLASH_KEY_HERE]') {
            return asset('images/herbs/default-herb.jpg');
        }

        $query = urlencode($herbName . ' herb white background');
        $url = "https://api.unsplash.com/search/photos?query={$query}&per_page=1&orientation=squarish&client_id={$key}";

        $response = Http::timeout(5)->get($url);

        if ($response->ok() && isset($response['results'][0])) {
            return $response['results'][0]['urls']['small'];
        }

        return asset('images/herbs/default-herb.jpg');
    }
}
