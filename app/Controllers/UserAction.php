<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use App\Service\TwigSingleton;

final class UserAction
{
    public function __invoke()
    {
        
        $db = new UserRepository;
        $users = $db->findAll();
        echo TwigSingleton::getInstance()->render('users.html.twig', [
            'users' => $users,
        ]);
        //require_once __DIR__ . '/../Views/user/list.php';
    }
}
