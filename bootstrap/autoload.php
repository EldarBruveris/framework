<?php

declare(strict_types=1);

spl_autoload_register(static function ($class) {
    $path = str_replace('\\', '/', $class) . '.php';

    require_once __DIR__ . '/../' . lcfirst($path);
});
