<?php

declare(strict_types=1);

namespace App\Repository;

use GuzzleHttp\Client;

abstract class AbstractApiRepository
{
    protected Client $client;
    protected $TOKEN = '2834119cad3fef2d82d9e9b934917ffcad7975d65ced6d62ffe7b46fe6205cdb';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://gorest.co.in/public/v2/'
        ]);
    }
}