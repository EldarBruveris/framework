<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repository\UserRepository;

final class ShowAction
{
    public function __invoke($userID)
    {
        $db = new UserRepository();
        
        $user = $db->find($userID, 'id');
        require_once __DIR__ . '/../Views/find/findResult.php';
    }
}
