<?php

declare(strict_types=1);

namespace App\Controllers;

use app\Repository\UserRepository;

final class ShowAction
{
    public function __invoke()
    {
        $db = new UserRepository();
        $critery = $_POST['choice'];
        
        $user = $db->find($critery, 'id');
        require_once __DIR__ . '/../Views/find/findResult.php';
    }
}
