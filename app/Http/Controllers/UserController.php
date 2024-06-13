<?php

namespace App\Http\Controllers;
use App\Charts\MonthlyUsersChart;
use App\Charts\chart1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MonthlyUsersChart $chart, chart1 $chart1)
    {
        return view('dashboard', ['chart' => $chart->build(), 'chart1' => $chart1->build()]);


    } 

    public function sensor(Request $request){
        $client = new Client();
        $well_id = $request->well_id;

        if (empty($well_id)) {
            return response()->json(['message' => 'well ID is missing'], 400);
        }

        $headers = [
            'Authorization' => 'Bearer ' . session('access_token'),
            'Accept' => 'application/json', 
        ];

        $url = sprintf('http://27.112.79.127/api/well', $well_id);

        $response_sensor = $client->get($url, [
            'headers' => $headers,
        ]);

        if ($response_sensor->getStatusCode() === 200) {
            $sensor = json_decode($response_sensor->getBody()->getContents()) -> data;
            // Proses data yang diperoleh
            Log::info('Sensor Data: ', (array) $sensor);
       
        } else {
            // Handle error response
            echo 'Terjadi kesalahan: ' . $response_sensor->getStatusCode();
        }
        
        return view('/dashboard', compact('sensor'));
        // data terbaru adalah data dengan index terakhir
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
