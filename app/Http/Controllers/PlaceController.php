<?php

namespace App\Http\Controllers;

use App\Actions\FetchPlaceReviewAction;
use App\Actions\FirstOrCreatePlaceAction;
use App\Http\Requests\StorePlaceRequest;
use App\Models\Place;
use App\Services\PlaceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    protected $placeService;

    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }

    public function index()
    {
        $mockPlace = config('mock_google_place');
        return view('index', compact('mockPlace'));
    }

    public function store(
        StorePlaceRequest $request,
        FirstOrCreatePlaceAction $firstOrCreatePlaceAction,
        FetchPlaceReviewAction $fetchPlaceReviewAction,
    )
    {
        $place = $firstOrCreatePlaceAction->handle($request->validated('place_id'));

        $fetchPlaceReviewAction->handle($place);
        
        $place->load('reviews');

        return redirect()->route('places.show', $place)->with('success', 'Reviews fetched successfully!');
    }

    public function show(Place $place)
    {
        // If place is already claimed by a user, redirect guests to login
        if ($place->user()->exists() && Auth::guest()) {
            return redirect()->route('login', ['place_id' => $place->id]);
        }

        $place->load('reviews');
        
        $photoUrl = $place->photo_url;

        return view('reviews', compact('place', 'photoUrl'));
    }

    public function autocomplete(Request $request)
    {
        $input = $request->query('input');
        if (empty($input)) {
            return response()->json([]);
        }

        $suggestions = $this->placeService->autocomplete($input);
        
        return response()->json(array_map(fn($item) => $item->toArray(), $suggestions));
    }

    public function details($id)
    {
        $details = $this->placeService->getDetails($id);

        if ($details) {
            return response()->json($details->toArray());
        }

        return response()->json(['error' => 'Place not found'], 404);
    }
}
