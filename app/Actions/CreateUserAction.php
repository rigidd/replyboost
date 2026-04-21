<?php

namespace App\Actions;

use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    /**
     * Create a new user with hashed password.
     */
    public function handle(array $data): User
    {
        if (Place::find($data['place_id'])->user()->exists()) {
            abort(422, 'Ce commerce est déjà lié à un compte.');
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'place_id' => $data['place_id'] ?? null,
        ]);
    }
}
