<?php

namespace App\Http\Controllers;

use App\Models\Herb;
use App\Services\UnsplashService;
use Illuminate\Http\Request;

class HerbController extends Controller
{
    /**
     * Display all herbs catalog
     */
    public function index(Request $request, UnsplashService $unsplashService)
    {
        $query = Herb::active()->sorted();

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->byCategory($request->category);
        }

        // Search
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name_en', 'like', '%' . $request->search . '%')
                  ->orWhere('name_ar', 'like', '%' . $request->search . '%')
                  ->orWhere('description_en', 'like', '%' . $request->search . '%')
                  ->orWhere('description_ar', 'like', '%' . $request->search . '%');
            });
        }

        $herbs = $query->get();
        $herbs->transform(function ($herb) use ($unsplashService) {
            $herb->image_url = str_starts_with((string) $herb->image, 'http')
                ? $herb->image
                : (filled($herb->image) ? asset('images/herbs/' . $herb->image) : $unsplashService->getHerbImage($herb->name));
            return $herb;
        });
        $categories = Herb::active()->distinct()->pluck('category')->sort();

        return view('herbs.index', compact('herbs', 'categories'));
    }

    /**
     * Display single herb details
     */
    public function show($slug)
    {
        $herb = Herb::active()->where('slug', $slug)->firstOrFail();

        // Get related herbs from same category
        $relatedHerbs = Herb::active()
            ->byCategory($herb->category)
            ->where('id', '!=', $herb->id)
            ->take(4)
            ->get();

        return view('herbs.show', compact('herb', 'relatedHerbs'));
    }
}
