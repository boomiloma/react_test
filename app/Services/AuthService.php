<?php

namespace App\Services;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(array $data): JsonResponse
    {
        try {
            if (Auth::attempt($data)) {
                $user = Auth::user();
                $user->tokens()->delete();
                return response()->json([
                    'user' => $user,
                    'token' => $user->createToken($user->email)->plainTextToken,
                ], 200);
            }

            return response()->json([
                'messages' => ['Incorrect Username or password'],
            ], 401);
        } catch (\Exception $e) {
            return generalErrorResponse($e);
        }
    }

    public function user()
    {
        if (Auth::user()) {
            $user = Auth::user();
            return response()->json([
                'user' => $user
            ], 200);
        }

        return response()->json(['messages' => ['User not found']], 400);
    }

    public function logout()
    {
        if (Auth::user()) {
            Auth::user()->tokens()->delete();
            }
        return response()->json(['messages' => ['Logout successful']], 200);
    }
}
