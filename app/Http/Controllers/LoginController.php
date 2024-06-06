<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class LoginController extends Controller
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
        // dd($response);

        // Cek status response
        if ($response->ok()) {
            // Parse response JSON
            $responseData = json_decode($response->getBody()->getContents());
            // dd($responseData->data->token);

            // Cek apakah login berhasil
            if (isset($responseData->data->token)) {
                // Simpan token ke session atau localStorage
                session()->put('access_token', $responseData->data->token);
                $token = session('access_token');

                // Kembalikan respons sukses
                // return response()->json([
                //     'message' => 'Login berhasil',
                //     'token' => $token
                // ]);
                return redirect('/mainscreen');
            } else {
                // Kembalikan respons error
                // return response()->json([
                //     'message' => 'Login gagal',
                //     'errors' => $responseData->errors,
                // ], 401);
                return view('login');
            }
        } else {
            // Kembalikan respons error generik
            // return response()->json([
            //     'message' => 'Terjadi kesalahan saat login',
            // ], 500);

            return view('login');
        }
    }

    public function mainscreen(){
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . session('access_token'),
            'Accept' => 'application/json', 
        ];

        $response_company = $client->get('https://bepdu.aliifam.com/api/company', [
            'headers' => $headers,
        ]);
        // dd($response->getBody()->getContents());

        if ($response_company->getStatusCode() === 200) {
            $data = json_decode($response_company->getBody()->getContents()) -> data;
            // Proses data yang diperoleh
            // dd($data);
        } else {
            // Handle error response
            echo 'Terjadi kesalahan: ' . $response_company->getStatusCode();
        }

        
        return view('/mainscreen', compact('data'));

    }
    public function place(Request $request){
        $client = new Client();
        $company_id = $request->company_id;

        $headers = [
            'Authorization' => 'Bearer ' . session('access_token'),
            'Accept' => 'application/json', 
        ];

        $response_place = $client->get('https://bepdu.aliifam.com/api/company/'.$company_id.'/place', [
            'headers' => $headers,
        ]);
        // dd($response->getBody()->getContents());

        if ($response_place->getStatusCode() === 200) {
            $place = json_decode($response_place->getBody()->getContents()) -> data;
            // Proses data yang diperoleh
            // dd($data);
        } else {
            // Handle error response
            echo 'Terjadi kesalahan: ' . $response_place->getStatusCode();
        }

        
        return view('/place', compact('place'));

    }
    public function well(Request $request){
        $client = new Client();
        $company_id = $request->company_id;

        $headers = [
            'Authorization' => 'Bearer ' . session('access_token'),
            'Accept' => 'application/json', 
        ];

        $response_place = $client->get('https://bepdu.aliifam.com/api/company/'.$company_id.'/place', [
            'headers' => $headers,
        ]);
        // dd($response->getBody()->getContents());

        if ($response_place->getStatusCode() === 200) {
            $place = json_decode($response_place->getBody()->getContents()) -> data;
            // Proses data yang diperoleh
            // dd($data);
        } else {
            // Handle error response
            echo 'Terjadi kesalahan: ' . $response_place->getStatusCode();
        }
        
        return view('/place', compact('place'));

    }
}
