<?php

namespace App\Actions;

use App\Models\Place;
use App\Services\PlaceService;

class FirstOrCreatePlaceAction
{
    public function __construct(
        private PlaceService $placeService,
    ) {}

    public function handle(string $placeId)
    {
        $place = Place::where('google_place_id', $placeId)->first();

        if (!$place) {
            $detail = $this->placeService->getDetails($placeId);

            $place = Place::create([
                'google_place_id' => $placeId,
                'name' => $detail->name,
                'google_url' => $detail->url,
                'photo_url' => $detail->photoUrl,
            ]);
        }

        return $place;
    }
}