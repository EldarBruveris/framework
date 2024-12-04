<?php

declare(strict_types=1);

namespace App\Controllers;

use app\Models\User;
use app\Repository\UserRepository;

final class ResultAction
{
    private static $counter = 0;
    public function __invoke()
    {

        $user = new User(ResultAction::$counter, $_POST['name'], $_POST['email'], $_POST['gender'], $_POST['status']);
        ResultAction::$counter++;
        $db = new UserRepository;
        if ($db->save($user)){
            require_once __DIR__ . '/../Views/result.php'; 
        }
    }
}
