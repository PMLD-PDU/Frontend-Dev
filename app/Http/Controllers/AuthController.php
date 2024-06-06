<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi data login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Siapkan data untuk request login ke REST API
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Lakukan request login ke REST API
        $response = Http::post('https://bepdu.aliifam.com/api/employee/login', $data);
        dd($response);

        // Cek status response
        if ($response->ok()) {
            // Parse response JSON
            $responseData = json_decode($response->getBody()->getContents());

            // Cek apakah login berhasil
            if (isset($responseData->access_token)) {
                // Simpan token ke session atau localStorage
                session()->put('access_token', $responseData->access_token);

                // Kembalikan respons sukses
                return response()->json([
                    'message' => 'Login berhasil',
                ]);
            } else {
                // Kembalikan respons error
                return response()->json([
                    'message' => 'Login gagal',
                    'errors' => $responseData->errors,
                ], 401);
            }
        } else {
            // Kembalikan respons error generik
            return response()->json([
                'message' => 'Terjadi kesalahan saat login',
            ], 500);
        }

    }
    // public function login(Request $request)
    // {
    //     // Validasi input
    //     $credentials = $request->only('email', 'password');

    //     try {
    //         // Coba buat token dengan kredensial yang diberikan
    //         if (!$token = Auth::attempt($credentials)) {
    //             return response()->json(['error' => 'Unauthorized'], 401);
    //         }
    //     } catch (JWTException $e) {
    //         // Jika ada masalah dalam membuat token
    //         return response()->json(['error' => 'Could not create token'], 500);
    //     }

    //     // Jika berhasil, kirimkan token
    //     return response()->json(['token' => $token]);
    // }
}
