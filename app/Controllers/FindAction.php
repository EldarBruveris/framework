<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Service\TwigSingleton;

final class FindAction
{
    public function __invoke()
    {

        echo TwigSingleton::getInstance()->render('findUser.html.twig');
        //require_once __DIR__ . '/../Views/find/find.php';
    }
}
