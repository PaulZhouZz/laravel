<?php
namespace App\Component\Esearch;

use Elasticsearch\ClientBuilder;

class SearchClient
{
    private static $client;
    private static $instance;

    public static function getInstance()
    {
        if (!self::$client) {
            $clientBuilder = ClientBuilder::create();
            $clientBuilder->setRetries(3);
            $clientBuilder->setHosts(['127.0.0.1:9200']);

            self::$client = $clientBuilder->build();
            self::$instance = new self();
        }
        return self::$client;
    }

    public function client()
    {
        return self::$client;
    }

    public function delete(array $params)
    {
        return $this->client()->delete($params);
    }
}