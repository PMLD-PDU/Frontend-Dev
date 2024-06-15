<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        // Hapus token dari session
        $request->session()->forget('access_token');

        // Redirect ke halaman login atau halaman lain setelah logout
        return redirect('/login');
    }

}
