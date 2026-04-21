<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard home.
     */
    public function index()
    {
        $user = Auth::user();
        $place = $user->place;
        
        // Stats
        $stats = [
            'total_reviews' => $place ? $place->reviews()->count() : 0,
            'ai_responses' => $place ? $place->reviews()->whereNotNull('response')->count() : 0,
        ];

        return view('dashboard.index', compact('user', 'place', 'stats'));
    }

    /**
     * Display the reviews list in the dashboard.
     */
    public function reviews()
    {
        $user = Auth::user();
        $place = $user->place;
        $reviews = $place ? $place->reviews()->latest()->get() : collect();

        return view('dashboard.reviews', compact('user', 'place', 'reviews'));
    }
}
