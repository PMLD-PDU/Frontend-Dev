<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function index()
    {
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
        $response = Http::post('http://27.112.79.127/api/employee/login', $data);
        // dd($response);

        // Cek status response
        if ($response->ok()) {
            // Parse response JSON
            $responseData = json_decode($response->getBody()->getContents());

            // Cek apakah login berhasil
            if (isset($responseData->data->token)) {
                // Simpan token ke session atau localStorage
                session()->put('access_token', $responseData->data->token);
                $token = session('access_token');

                return redirect('/mainscreen');
            } else {
                return view('login');
            }
        } else {
            return view('login');
        }
    }

    public function mainscreen()
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . session('access_token'),
            'Accept' => 'application/json',
        ];

        $response_company = $client->get('http://27.112.79.127/api/company', [
            'headers' => $headers,
        ]);

        if ($response_company->getStatusCode() === 200) {
            $data = json_decode($response_company->getBody()->getContents())->data;
        } else {
            // Handle error response
            echo 'Terjadi kesalahan: ' . $response_company->getStatusCode();
        }

        return view('/mainscreen', compact('data'));
    }
    public function place(Request $request)
    {
        $client = new Client();
        $company_id = $request->company_id;

        $headers = [
            'Authorization' => 'Bearer ' . session('access_token'),
            'Accept' => 'application/json',
        ];

        $response_place = $client->get('http://27.112.79.127/api/company/' . $company_id . '/place', [
            'headers' => $headers,
        ]);

        if ($response_place->getStatusCode() === 200) {
            $place = json_decode($response_place->getBody()->getContents())->data;
        } else {
            // Handle error response
            echo 'Terjadi kesalahan: ' . $response_place->getStatusCode();
        }

        return view('/place', compact('place', 'company_id'));
    }

    public function well(Request $request)
    {
        $client = new Client();
        $company_id = $request->company_id;
        $place_id = $request->place_id;

        // Validasi input
        if (empty($company_id) || empty($place_id)) {
            return response()->json(['message' => 'Company ID or Place ID is missing'], 400);
        }

        $headers = [
            'Authorization' => 'Bearer ' . session('access_token'),
            'Accept' => 'application/json',
        ];

        $url = sprintf('http://27.112.79.127/api/company/%s/place/%s/well', $company_id, $place_id);

        $response_well = $client->get($url, [
            'headers' => $headers,
        ]);

        if ($response_well->getStatusCode() === 200) {
            $well = json_decode($response_well->getBody()->getContents())->data;
        } else {
            // Handle error response
            echo 'Terjadi kesalahan: ' . $response_well->getStatusCode();
        }

        return view('/well', compact('well', 'company_id'));
    }
}
