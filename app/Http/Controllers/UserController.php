<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUsersChart;
use App\Charts\chart1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function index(MonthlyUsersChart $chart, chart1 $chart1, Request $request)
    {
        $company_id = $request->company_id;
        $well_id = $request->well_id;
        return view('dashboard', ['chart' => $chart->build(), 'chart1' => $chart1->build(), 'well_id' => $well_id, 'company_id' => $company_id]);
    }

    public function sensor(Request $request)
    {
        $client = new Client();
        $well_id = $request->well_id;

        if (empty($well_id)) {
            return response()->json(['message' => 'Well ID is missing'], 400);
        }

        $headers = [
            'Authorization' => 'Bearer ' . session('access_token'),
            'Accept' => 'application/json',
        ];

        $url = sprintf('http://27.112.79.127/api/well/%s', $well_id);

        try {
            $response_sensor = $client->get($url, [
                'headers' => $headers,
            ]);

            if ($response_sensor->getStatusCode() === 200) {
                $sensor = json_decode($response_sensor->getBody()->getContents())->data;
                Log::info('Sensor Data: ', (array) $sensor);
                return response()->json($sensor);
            } else {
                return response()->json(['message' => 'Error: ' . $response_sensor->getStatusCode()], $response_sensor->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function sensorByCompany(Request $request)
    {
        $client = new Client();
        $company_id = $request->company_id;

        if (empty($company_id)) {
            return response()->json(['message' => 'Company ID is missing'], 400);
        }

        $headers = [
            'Authorization' => 'Bearer ' . session('access_token'),
            'Accept' => 'application/json',
        ];

        $url = sprintf('http://27.112.79.127/api/company/%s', $company_id);

        try {
            $response_sensor = $client->get($url, [
                'headers' => $headers,
            ]);

            if ($response_sensor->getStatusCode() === 200) {
                $sensor = json_decode($response_sensor->getBody()->getContents())->data;
                Log::info('Sensor Data by Company: ', (array) $sensor);
                return response()->json($sensor);
            } else {
                return response()->json(['message' => 'Error: ' . $response_sensor->getStatusCode()], $response_sensor->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function notification(Request $request)
    {
        $client = new Client();
        $well_id = $request->well_id;

        if (empty($well_id)) {
            return response()->json(['message' => 'Well ID is missing'], 400);
        }

        $headers = [
            'Authorization' => 'Bearer ' . session('access_token'),
            'Accept' => 'application/json',
        ];

        $url = sprintf('http://27.112.79.127/api/well/%s/notification', $well_id);

        try {
            $response_notification = $client->get($url, [
                'headers' => $headers,
            ]);

            if ($response_notification->getStatusCode() === 200) {
                $notification = json_decode($response_notification->getBody()->getContents())->data;
                Log::info('Notification Data: ', (array) $notification);
                return response()->json(['data' => $notification]);
            } else {
                return response()->json(['message' => 'Error: ' . $response_notification->getStatusCode()], $response_notification->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function markAsSeen($wellId, $notificationId)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . session('access_token'),
            'Accept' => 'application/json',
        ];

        $url = sprintf('http://27.112.79.127/api/well/%s/notification/%s/seen', $wellId, $notificationId);

        try {
            $response = $client->patch($url, [
                'headers' => $headers,
            ]);

            if ($response->getStatusCode() === 200) {
                $data = json_decode($response->getBody()->getContents())->data;
                return response()->json(['data' => $data]);
            } else {
                return response()->json(['message' => 'Error: ' . $response->getStatusCode()], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
