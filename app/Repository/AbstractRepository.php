<?php

namespace App\Repository;

use App\Service\Database\Connection;

abstract class AbstractRepository{
    protected \PDO $connection;

    public function __construct(){
        $this->connection = Connection::getInstance();
    }
}