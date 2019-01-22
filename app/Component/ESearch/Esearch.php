<?php
namespace App\Component\Esearch;

class Esearch
{
    public function __construct()
    {
        $client = SearchClient::getInstance();
    }
}