<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        $placeholderApiUrl = 'https://example.com/api/company';

        // Fetch API
        $response = Http::get($placeholderApiUrl);
        $companyInfo = $response->json();

        // Extract rig name from company info
        $rigName = 'Unknown Rig';; // edit nanti sesuai isi API
        $companyName = $companyInfo['company_name'] ?? 'Unknown company'; // edit nanti sesuai isi API

        return view('dashboard', compact('rigName', 'companyName'));
    }
}

