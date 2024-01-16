<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SanctumController extends Controller
{
    public function login(Request $request)
    {
        $validatedCredentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::withoutGlobalScopes()->where('email', $validatedCredentials['email'])->first();

        if (!$user || !Hash::check($validatedCredentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($user->email)->plainTextToken;
    }

    public function user(Request $request)
    {
        return $request->user();
    }
}
