<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repository\UserRepository;
use App\Service\Test;
use App\Service\TwigSingleton;

final class HomeAction extends AbstractUserAction
{
    public function __invoke()
    {

        $this->render('home.html.twig');
        // require_once __DIR__ . '/../Views/user/list.php';
    }
}
