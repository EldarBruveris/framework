<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Service\Database\Connection;

abstract class AbstractMigration
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    public function execUp(): void
    {
        $sql = $this->up();

        $this->pdo->exec($sql);
    }

    // apply migration
    abstract public function up(): string;

    // rollback migration
    abstract public function down(): void;
}
