<?php

declare(strict_types=1);

namespace App\Controllers;

use app\Repository\UserRepository;

final class UserEditAction
{
    public function __invoke($userID)
    {
        $db = new UserRepository();
        
        $user = $db->find('id', $userID);

        require_once __DIR__ . '/../Views/edit/editUser.php';
    }
}
