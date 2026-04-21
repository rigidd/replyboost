<?php

use App\Http\Controllers\Core\HealthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/health', HealthController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('/', [PlaceController::class, 'index'])->name('index');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register/{place}', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

Route::post('/analyze', [PlaceController::class, 'store'])->name('places.store');
Route::get('/places/{place}', [PlaceController::class, 'show'])->name('places.show');
Route::post('/reviews/{review}/generate', [ReviewController::class, 'generateResponse'])->name('reviews.generate');


// Dashboard Area
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/avis', [DashboardController::class, 'reviews'])->name('dashboard.reviews');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Proxy Routes for Google Places (Secure)

Route::get('/api/places/autocomplete', [PlaceController::class, 'autocomplete'])->name('api.places.autocomplete');
Route::get('/api/places/details/{id}', [PlaceController::class, 'details'])->name('api.places.details');

Route::view('/cgv', 'cgv')->name('cgv');
Route::view('/confidentialite', 'privacy')->name('privacy');
Route::view('/mentions-legales', 'legal')->name('legal');

