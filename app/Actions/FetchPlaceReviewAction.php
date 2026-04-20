<?php

namespace App\Actions;

use App\Models\Place;
use App\Models\Review;
use App\Services\ScraperService;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class FetchPlaceReviewAction
{
    public function __construct(
        private ScraperService $scraperService
    ) {}

    public function handle(Place $place): Collection
    {
        if ($place->reviews()->count() > 0) {
            return $place->reviews()->get();
        }

        $reviewsData = $this->scraperService->fetchReviews($place->google_place_id);

        if (empty($reviewsData)) {
            return collect();
        }

        foreach ($reviewsData as $data) {
            Review::create([
                'place_id'    => $place->id,
                'author_name' => $data['author_name'] ?? 'Anonyme',
                'author_photo'=> $data['avatarUrl'] ?? null,
                'rating'      => $data['rating'] ?? 0,
                'content'     => $data['content'] ?? '',
                'review_date' => $data['review_date'],
            ]);
        }

        return $place->reviews()->get();
    }
}