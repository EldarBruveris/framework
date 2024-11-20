<?php

declare(strict_types=1);

namespace App\Controllers;

final class UserDetailsAction
{
    public function __invoke($userID)
    {
        echo 'User Details Action. ID = ' . $userID;
    }
}
