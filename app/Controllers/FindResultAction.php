<?php

declare(strict_types=1);

namespace App\Controllers;

use app\Repository\UserRepository;

final class FindResultAction
{
    public function __invoke()
    {
        $db = new UserRepository();
        $critery = $_POST['choice'];
        $value = $_POST['value'];
        
        $user = $db->find($critery, $value);

        require_once __DIR__ . '/../Views/find/findResult.php';
    }
}
