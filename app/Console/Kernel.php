<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
	    $schedule->command('send:payouts')->hourly();
        $schedule->command('send:order-reminders')->hourly();
        $schedule->command('markOrdersCompleted')->everyFiveMinutes();        
	    $schedule->command('queue:work --tries=2 --stop-when-empty')->everyMinute()->withoutOverlapping();

		$schedule->call( function() { info("Hello I ran");
});
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

