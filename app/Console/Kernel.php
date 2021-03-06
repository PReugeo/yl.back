<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Console;

use App\Console\Commands\CalculateActiveMaterial;
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
        \App\Console\Commands\GenerateToken::class,
        \App\Console\Commands\AddModule::class,
        \App\Console\Commands\GenerateInventory::class,
        \App\Console\Commands\GenerateMonthlyCharges::class,
        \App\Console\Commands\GenerateShowdocApi::class,
        CalculateActiveMaterial::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('p_o:add-module')->everyThirtyMinutes();
        $schedule->command('p_o:generate-inventory')->monthly();
        $schedule->command('p_o:generate-monthly-charges')->daily();
        $schedule->command('p_o:generate-showdoc-api')->everyMinute();
        $schedule->command('yake:calculate-active-material')->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
