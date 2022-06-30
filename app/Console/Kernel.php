<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule
            ->command('queue:retry all')
            ->everyTwoMinutes()
            ->emailWrittenOutputTo(config('logging.debug.email'))
            ->name(config("app.name") . ' queues failed on ' . config("app.env"))
            ->onOneServer();

        if (config('backup.enabled')) {
            $schedule->command('backup:clean')->dailyAt('00:00');
            $schedule->command('backup:run')->dailyAt('00:15');
            $schedule->command('backup:monitor')->dailyAt('00:30');
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
