<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('articles:publish-scheduled')->everyMinute();
        $schedule->command('galeries:publish-scheduled')->everyMinute();
        $schedule->command('albums:publish-scheduled')->everyMinute();
        $schedule->command('albumvideos:publish-scheduled')->everyMinute();
        $schedule->command('videos:publish-scheduled')->everyMinute();

    }


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
