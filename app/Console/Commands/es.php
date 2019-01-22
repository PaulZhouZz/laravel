<?php

namespace App\Console\Commands;

use App\Component\Esearch\SearchClient;
use Illuminate\Console\Command;

class es extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'es';

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
        $client = SearchClient::getInstance();
        $params = [
            'index' => 'zsl',
            'type' => 'paul',
            'id' => '1992',
            'body' => ['testField' => 'im a programmer, im single, i wanna a girlfriend'],
        ];

        $response = $client->index($params);
        print_r($response);
    }
}
