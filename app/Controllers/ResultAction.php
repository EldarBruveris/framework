<?php

declare(strict_types=1);

namespace App\Controllers;

final class ResultAction
{
    public function __invoke()
    {
        require_once __DIR__ . '/../Views/result.php';
    }
}
