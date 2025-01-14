<?php

declare(strict_types=1);

use App\Infrastructure\AbstractMigration;
use App\Service\Database\Connection;

require_once __DIR__ . "/../bootstrap/autoload.php";

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator(__DIR__ . "/../migration"),
    RecursiveIteratorIterator::SELF_FIRST
);

$pdo = Connection::getInstance();
//$pdo->beginTransaction();


$checkTableExists = $pdo->query("
        SELECT EXISTS (
            SELECT FROM information_schema.tables 
            WHERE table_schema = 'public' 
            AND table_name = 'migration_versions'
        )
    ")->fetchColumn();

if (!$checkTableExists) {
    // Создание таблицы migration_versions, если её нет
    $pdo->exec("
            CREATE TABLE migration_versions (
                version VARCHAR(255) PRIMARY KEY,
                executed_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            )
        ");

    echo "Таблица migration_versions создана." . PHP_EOL;
}

/** @var list<string> $existingMigrations */
$existingMigrations =
    array_map(static fn ($item) => $item['version'], $pdo->query("SELECT version FROM migration_versions")->fetchAll(PDO::FETCH_ASSOC));

try {
    $migration = [];
    foreach($iterator as $file){
       /** @var SplFileInfo $file */

       if (!$file->isFile()) {
        continue;
        }

        if (in_array($file->getFilename(), $existingMigrations, true)) {
        continue;
        }

        $migration[] = $file;
    }
    natcasesort($migration);

    // TODO сортировка по именам файлов
    foreach ($migration as $file) {
        /** @var SplFileInfo $file */

        if (!$file->isFile()) {
            continue;
        }

        if (in_array($file->getFilename(), $existingMigrations, true)) {
            continue;
        }

        $class = require_once $file->getPathname();
        /** @var AbstractMigration $migration */
        $migration = new $class();
        $migration->execUp();

        $version = $file->getFilename();

        $connection = $pdo->exec(<<<SQL
INSERT INTO migration_versions (version, executed_at)
VALUES ('$version', NOW());
SQL
        );

        echo "Миграция {$version} применена." . PHP_EOL;
    }

//    $pdo->commit();
} catch (Throwable $e) {
//    $pdo->rollBack();
    throw $e;
}

die;

