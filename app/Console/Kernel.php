<?php

namespace App\Console;

use App\Http\Controllers\WeatherWarningController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $controller = new WeatherWarningController();
            $controller->fetchFerryStatuses();
        })->daily()->between('05:00', '22:00')->everyTwoHours();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
?>