<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        $supported = ['en', 'ar', 'ru', 'uk', 'fr', 'de'];

        if (in_array($locale, $supported, true)) {
            session(['locale' => $locale]);
        }

        return redirect()->back();
    }
}
