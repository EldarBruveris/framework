<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repository\UserRepository;
use App\Service\TwigSingleton;

final class FindResultAction extends AbstractUserAction
{
    public function __invoke()
    {
        $value = (int)$_POST['value'];
        
        $user = $this->repository->show((int)$value);
        $this->render('findResult.html.twig', $user);


        // echo TwigSingleton::getInstance()->render('findResult.html.twig', [
        //     'user' => $user,
        // ]);

        //require_once __DIR__ . '/../Views/find/findResult.php';
    }
}
