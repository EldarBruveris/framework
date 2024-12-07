<?php

declare(strict_types=1);

namespace App\Controllers;

final class FindAction
{
    public function __invoke()
    {
        require_once __DIR__ . '/../Views/find/find.php';
    }
}
