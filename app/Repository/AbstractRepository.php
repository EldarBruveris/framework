<?php

namespace app\Repository;

use app\Service\Database\Connection;

abstract class AbsrtractRepository{
    protected \PDO $connection;

    public function __construct(){
        $this->connection = Connection::getInstance();
    }
}