<?php

namespace App\Repository;

use App\Service\Database\Connection;
use GuzzleHttp\Client;

abstract class AbstractRepository{
    protected \PDO $connection;
    protected Client $client;

    public function __construct(){
        $this->connection = Connection::getInstance();
        $this->client = new Client([
            'base_uri' => 'https://gorest.co.in/public/v2/',
        ]);
    }
}