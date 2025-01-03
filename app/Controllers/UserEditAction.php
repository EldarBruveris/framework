<?php

declare(strict_types=1);

namespace App\Controllers;

use app\Models\User;
use app\Repository\UserRepository;

final class UserEditAction
{
    public function __invoke($userID)
    {
        $db = new UserRepository();
        $user = new User($userID); //TODO сбор юзера
        $check = $db->edit($user);

        require_once __DIR__ . '/../Views/edit/editUser.php';
    }
}
