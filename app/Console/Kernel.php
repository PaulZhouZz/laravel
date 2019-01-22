<?php

namespace App\Console;

use App\Console\Commands\es;
use App\Console\Commands\ExecCommand;
use App\Console\Commands\ExecCommand2;
use App\Console\Commands\PaulNohup;
use App\Console\Commands\Tesssst;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        ExecCommand::class,
        ExecCommand2::class,
        PaulNohup::class,
        Tesssst::class,
        es::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
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
