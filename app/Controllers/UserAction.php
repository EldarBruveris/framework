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
        $paginatedData = $db->getPaginatedData(1, 10);

        echo TwigSingleton::getInstance()->render('users.html.twig', [
            'users' => $paginatedData['data'],
            'pagination' => [
                'page' => $paginatedData['page'], 
                'totalPages' => $paginatedData['totalPages'],
            ],
        ]);
        //require_once __DIR__ . '/../Views/user/list.php';
    }
}
