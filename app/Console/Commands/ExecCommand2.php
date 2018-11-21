<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExecCommand2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'two';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $a = '/usr/bin/php /mnt/d/www/laravel/artisan one';
        echo exec($a);
    }
}
