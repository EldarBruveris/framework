<?php

declare(strict_types=1);

namespace App\Controllers;

final class HomeAction
{
    public function __invoke()
    {
        require_once __DIR__ . '/../Views/home/home.php';
    }
}
