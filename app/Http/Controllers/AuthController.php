<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->only('email', 'password');

        try {
            // Coba buat token dengan kredensial yang diberikan
            if (!$token = Auth::attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (JWTException $e) {
            // Jika ada masalah dalam membuat token
            return response()->json(['error' => 'Could not create token'], 500);
        }

        // Jika berhasil, kirimkan token
        return response()->json(['token' => $token]);
    }
}
