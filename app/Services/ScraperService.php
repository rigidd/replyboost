<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ScraperService
{
    protected $apiKey;
    public function __construct() {
        $this->apiKey = config('app.hasData.apiKey');
    }
    
    /**
     * Fetch reviews from a Google Business URL using HasData API.
     */
    public function fetchReviews(string $place_id): array
    {
        try {
            $response = Http::withHeaders([
                'x-api-key' => $this->apiKey,
                'Content-Type' => 'application/json',
            ])->get('https://api.hasdata.com/scrape/google-maps/reviews', [
                'placeId' => $place_id,
                'sortBy' => 'newestFirst',
                'hl' => 'fr'
            ]);

            if ($response->failed()) {
                Log::error('HasData API failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return [];
            }

            $data = $response->json();

            $reviews = [];

            // The API returns reviews in the 'results' or 'reviews' key usually
            $rawReviews = $data['reviews'] ?? [];

            foreach ($rawReviews as $item) {
                if (isset($item['snippet'])) {
                    $reviews[] = [
                        'author_name' => $item['user']['name'] ?? 'Anonymous',
                        'rating' => (int) ($item['rating'] ?? 5),
                        'content' => $item['snippet'] ?? 'No review text provided.',
                        'review_date' => $item['date'] ?? 'Recently',
                    ];
                }
            }

            return $reviews;

        } catch (\Throwable $e) {
            Log::error('HasData Scraping Error: ' . $e->getMessage());
            return [];
        }
    }
}