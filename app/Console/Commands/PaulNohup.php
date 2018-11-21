<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PaulNohup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tt';

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
        \App\Models\Tesssst::updateOrCreate(
            [
                'date' => '2019-102-22',
                'ad_config_id' => '2',
                'ad_type' => '2',
                'ad_place' => '2',
                'channel' => '2',
                'percent_info' => '2',
                'floor_ecpm_info' => '2',
                'weight' => '2',
                'earnings' => '2',
                'unique_id' => '2',
            ]
        );
    }
}
