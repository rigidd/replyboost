<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Services\AIService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $aiService;

    public function __construct(AIService $aiService)
    {
        $this->aiService = $aiService;
    }

    public function generateResponse(Review $review)
    {
        $response = $this->aiService->generateResponse(
            $review->author_name,
            $review->rating,
            $review->content
        );

        $review->update(['response' => $response]);

        return response()->json([
            'success' => true,
            'response' => $response,
        ]);
    }
}
