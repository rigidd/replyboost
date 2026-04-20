<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;

Route::get('/', [PlaceController::class, 'index'])->name('index');
Route::post('/analyze', [PlaceController::class, 'store'])->name('places.store');
Route::get('/places/{place}', [PlaceController::class, 'show'])->name('places.show');
Route::post('/reviews/{review}/generate', [ReviewController::class, 'generateResponse'])->name('reviews.generate');

// Proxy Routes for Google Places (Secure)
Route::get('/api/places/autocomplete', [PlaceController::class, 'autocomplete'])->name('api.places.autocomplete');
Route::get('/api/places/details/{id}', [PlaceController::class, 'details'])->name('api.places.details');

Route::view('/cgv', 'cgv')->name('cgv');
Route::view('/confidentialite', 'privacy')->name('privacy');
Route::view('/mentions-legales', 'legal')->name('legal');

