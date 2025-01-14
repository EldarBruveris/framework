<?php

declare(strict_types=1);

use App\Infrastructure\AbstractMigration;

return new class extends AbstractMigration
{
    public function up(): string
    {
        return <<<SQL
ALTER TABLE users
ADD COLUMN gender VARCHAR(6) NOT NULL,
ADD COLUMN status VARCHAR(50) NOT NULL DEFAULT 'active';
SQL;
    }

    public function down(): void
    {
    }
};
