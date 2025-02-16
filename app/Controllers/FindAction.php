<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Service\TwigSingleton;

final class FindAction extends AbstractUserAction
{
    public function __invoke()
    {

        $this->render('findUser.html.twig');
        //require_once __DIR__ . '/../Views/find/find.php';
    }
}
