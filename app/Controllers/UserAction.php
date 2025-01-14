<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Repository\UserRepository;

final class UserAction
{
    public function __invoke()
    {
        
        $db = new UserRepository;
        $users = $db->findAll();
    
        require_once __DIR__ . '/../Views/user/list.php';
    }
}
