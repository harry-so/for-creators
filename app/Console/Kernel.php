<?php

namespace App\Console;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Commands\WriteLog::class,
        Commands\PurchaserCommand::class
    ];
    
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        Log::info("runnning whotobuy");
        $schedule->command('whotobuy')
                 ->timezone('Asia/Tokyo')
                 ->appendOutputTo(storage_path('logs/write.log'))
                 ->onOneServer();
        // $schedule->call(function(){
        //     logger()->info("I'm Harry");
        // });

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

    protected function scheduleTimezone()
    {
        return 'Asia/Tokyo';
    }
}
