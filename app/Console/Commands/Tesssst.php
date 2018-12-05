<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Tesssst extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Teee {date?}';

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
        date_default_timezone_set('Pacific/Pitcairn');

        $argv = $this->argument('date');
        echo $argv . "\n";

//        print_r(config('auth.change_price_hour'));

//        \App\Models\Tesssst::addData([
//            'date' => '2019-1002-22',
//            'ad_config_id' => '2',
//            'ad_type' => '2',
//            'ad_place' => '2',
//            'channel' => '2',
//            'percent_info' => '2',
//            'floor_ecpm_info' => '2',
//            'weight' => '2',
//            'earnings' => '2',
//            'unique_id' => '2',
//        ]);

    }
}
