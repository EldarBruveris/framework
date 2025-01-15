<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repository\UserRepository;
use App\Service\TwigSingleton;

final class ShowAction
{
    public function __invoke($userID)
    {
        $db = new UserRepository();
        
        $user = $db->find($userID, 'id');
        echo TwigSingleton::getInstance()->render('findResult.html.twig', [
            'user' => $user,
        ]);

        //require_once __DIR__ . '/../Views/find/findResult.php';
    }
}
