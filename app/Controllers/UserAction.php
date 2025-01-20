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
        $page = (int)($_GET['page'] ?? 1);
        $perPage = 10;
        
        $paginatedData = $db->getPaginatedData($page, $perPage);
        $totalPages = $db->getMaxPages($perPage);

        echo TwigSingleton::getInstance()->render('users.html.twig', [
            'users' => $paginatedData,
            'pagination' => [
                    'page' => $page,
                    'totalPages' => $totalPages,
                ],
        ]);
        //require_once __DIR__ . '/../Views/user/list.php';
    }
}
