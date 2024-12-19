<?php

declare(strict_types=1);

use app\Infrastructure\AbstractMigration;

return new class extends AbstractMigration
{
    public function up(): string
    {
        return <<<SQL
    CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    full_name VARCHAR(255) NOT NULL
);
SQL;

    }

    public function down(): void
    {
        $sql = <<<SQL
        DROP TABLE IF EXISTS users;
SQL;
    }
};
