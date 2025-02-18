<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use App\Service\TwigSingleton;

final class UserEditAction extends AbstractUserAction
{
    public function __invoke($userID)
    {
        $user = $this->repository->show((int)$userID);

        $this->render('editUser.html.twig', ['user' => $user]);
        //require_once __DIR__ . '/../Views/edit/editUser.php';
    }
}
