<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Http;
use App\Events\DataUpdated;



class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    // protected function schedule(Schedule $schedule)
    // {
    //     // $schedule->command('fetch:wellapi')->everyMinute();
    //     // use cron in real server... 
    // }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * FOR DEVELOPMENT ONLY
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
             $response = Http::get('https://worldtimeapi.org/api/timezone/Asia/Jakarta');
             $data = $response->json();

            // Once you have fetched the data, you can broadcast it
            // For example:
             event(new DataUpdated($data));
        })->everyTenSeconds(); // Run every 10 seconds
    }
}
