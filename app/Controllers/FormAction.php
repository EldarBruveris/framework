<?php

declare(strict_types=1);

namespace App\Controllers;

final class FormAction
{
    public function __invoke()
    {
        require_once __DIR__ . '/../Views/form/form.html';
    }
}
