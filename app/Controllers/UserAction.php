<?php

declare(strict_types=1);

namespace App\Controllers;

use app\Models\User;
use app\Repository\UserRepository;

final class UserAction
{
    public function __invoke()
    {
        
        $db = new UserRepository;
        $users = $db->findAll();
    
        require_once __DIR__ . '/../Views/user/list.php';
    }
}
