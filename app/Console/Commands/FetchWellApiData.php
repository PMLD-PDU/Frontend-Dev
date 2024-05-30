<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Events\DataUpdated;

class FetchWellApiData extends Command
{
    protected $signature = 'fetch:wellapi';
    protected $description = 'Fetch data from the World Time API';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://worldtimeapi.org/api/timezone/Asia/Jakarta');

        if ($response->successful()) {
            $data = $response->json();

            // Broadcast the event
            broadcast(new DataUpdated($data));
            $this->info('Data fetched and event broadcasted.');
        } else {
            $this->error('Failed to fetch data from the API.');
        }
    }
}
