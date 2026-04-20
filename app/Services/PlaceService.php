<?php

namespace App\Services;

use App\DTOs\AutocompleteSuggestionDTO;
use App\DTOs\PlaceDetailsDTO;
use Illuminate\Support\Facades\Http;

class PlaceService
{
    protected string $apiKey;
    protected string $baseUrl = 'https://places.googleapis.com/v1';

    public function __construct()
    {
        $this->apiKey = config('services.google_maps.key');
    }

    /**
     * Get autocomplete suggestions for a given input.
     * 
     * @param string $input
     * @return AutocompleteSuggestionDTO[]
     */
    public function autocomplete(string $input): array
    {
        $response = Http::withHeaders([
            'X-Goog-Api-Key' => $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post("{$this->baseUrl}/places:autocomplete", [
            'input' => $input,
            'includedRegionCodes' => ['FR']
        ]);

        if ($response->successful() && isset($response['suggestions'])) {
            return collect($response['suggestions'])
                ->map(fn($item) => AutocompleteSuggestionDTO::fromArray($item))
                ->toArray();
        }

        return [];
    }

    /**
     * Get details for a specific place ID.
     * 
     * @param string $placeId
     * @return PlaceDetailsDTO|null
     */
    public function getDetails(string $placeId): ?PlaceDetailsDTO
    {
        $response = Http::withHeaders([
            'X-Goog-Api-Key' => $this->apiKey,
            'X-Goog-FieldMask' => 'id,displayName,googleMapsUri,photos',
        ])->get("{$this->baseUrl}/places/{$placeId}");

        if ($response->successful()) {
            $data = $response->json();
            $photoUrl = $this->extractPhotoUrl($data);

            return PlaceDetailsDTO::fromArray($data, $photoUrl);
        }

        return null;
    }

    /**
     * Extract the photo URL from place data if available.
     */
    protected function extractPhotoUrl(array $data): ?string
    {
        if (!empty($data['photos']) && isset($data['photos'][0]['name'])) {
            $photoName = $data['photos'][0]['name'];
            return "{$this->baseUrl}/{$photoName}/media?maxHeightPx=400&maxWidthPx=800&key={$this->apiKey}";
        }

        return null;
    }
}
