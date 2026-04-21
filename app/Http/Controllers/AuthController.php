<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Http\Requests\RegisterRequest;
use App\Actions\CreateUserAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show the application login form.
     */
    public function showLoginForm(Request $request)
    {
        $place = null;
        if ($request->has('place_id')) {
            $place = Place::find($request->query('place_id'));
        }

        return view('auth.login', compact('place'));
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    /**
     * Handle a logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }

    /**
     * Show the application registration form with place context.
     */
    public function showRegistrationForm(Place $place)
    {
        if ($place->user()->exists()) {
            return redirect()->route('login', ['place_id' => $place->id]);
        }
        return view('register', compact('place'));
    }

    /**
     * Handle a registration request for the application.
     */
    public function register(RegisterRequest $request, CreateUserAction $createUserAction)
    {
        $user = $createUserAction->handle($request->validated());

        Auth::login($user);

        return redirect()->intended(route('dashboard'));
    }
}
