<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repository\UserRepository;
use App\Service\TwigSingleton;

final class FindResultAction
{
    public function __invoke()
    {
        $db = new UserRepository();
        $critery = $_POST['choice'];
        $value = $_POST['value'];
        
        $user = $db->find($critery, $value);

        echo TwigSingleton::getInstance()->render('findResult.html.twig', [
            'user' => $user,
        ]);

        //require_once __DIR__ . '/../Views/find/findResult.php';
    }
}
