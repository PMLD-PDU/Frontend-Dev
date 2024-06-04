<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    public function getCompanyData(Request $request)
    {
        $token = $request->session()->get('token');

        if (!$token) {
            Log::error('Token not found in session');
            return response()->json(['error' => 'Token not found'], 401);
        }

        $url = 'https://bepdu.aliifam.com/api/company';

        try {
            $response = Http::withToken($token)->get($url);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                Log::error('Failed to fetch company data', ['status' => $response->status(), 'body' => $response->body()]);
                return response()->json(['error' => 'Could not fetch company data'], $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Exception while fetching company data', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Server error while fetching company data'], 500);
        }
    }
}
