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
        $placeholderApiUrl = 'http://example.com/api/company'; // Change to HTTP

        try {
            // Fetch API without verifying SSL certificate
            $response = Http::withoutVerifying()->get($placeholderApiUrl);
            $companyInfo = $response->json();

            // Extract rig name from company info
            $rigName = 'Unknown Rig';
            $companyName = $companyInfo['company_name'] ?? 'Unknown company';

            return view('dashboard', compact('rigName', 'companyName'));
        } catch (\Exception $e) {
            // Handle exception
            \Log::error('Error fetching API data: ' . $e->getMessage());
            return view('error');
        }
    }

}


