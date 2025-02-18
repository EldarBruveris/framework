<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repository\UserAPIRepository;
use App\Repository\UserRepository;
use App\Service\TwigSingleton;

final class ShowAction extends AbstractUserAction
{
    public function __invoke($userID)
    {
        $user = $this->repository->show((int)$userID);
        $this->render('findResult.html.twig', ['user' => $user]);
        

        //require_once __DIR__ . '/../Views/find/findResult.php';
    }
}
